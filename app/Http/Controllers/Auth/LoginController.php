<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        Log::channel('auth')->info('Login form accessed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'timestamp' => now(),
        ]);

        if (Auth::check()) {
            Log::channel('auth')->info('Already authenticated user tried to access login form', [
                'user_id' => Auth::id(),
                'ip' => request()->ip(),
            ]);
            return redirect('/portal/home')->with('info', 'Anda masih login, pastikan logout untuk login akun lain.');
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        Log::channel('auth')->info('Login attempt started', [
            'email' => $request->input('email'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now(),
        ]);

        if ($this->detectMaliciousInput($request)) {
            Log::channel('security')->warning('Malicious input detected in login attempt', [
                'email' => $request->input('email'),
                'password_length' => strlen($request->input('password', '')),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'suspicious_patterns' => $this->getSuspiciousPatterns($request),
            ]);
            
            return back()->with('error', 'Input tidak valid terdeteksi. Akses ditolak.');
        }

        $this->ensureIsNotRateLimited($request);

        $credentials = $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:3'],
            ],
            [
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email maksimal 255 karakter.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 3 karakter.',
            ],
        );

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            Log::channel('auth')->warning('Login attempt with non-existent email', [
                'email' => $credentials['email'],
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            RateLimiter::hit($this->throttleKey($request));
            return back()->with('error', 'Email atau password salah. Silakan coba lagi.');
        }

        if ($user->status !== 'active') {
            Log::channel('auth')->warning('Login attempt with inactive account', [
                'user_id' => $user->id,
                'email' => $user->email,
                'status' => $user->status,
                'ip' => $request->ip(),
            ]);
            
            return back()->with('error', 'Akun Anda tidak aktif. Silakan hubungi admin.');
        }

        $remember = $request->boolean('remember-me');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            Log::channel('auth')->info('Successful login', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'remember_me' => $remember,
            ]);

            RateLimiter::clear($this->throttleKey($request));

            return redirect()->intended('/portal/home')->with('success', 'Login berhasil! Selamat datang kembali.');
        }

        Log::channel('auth')->warning('Failed login attempt - wrong password', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        RateLimiter::hit($this->throttleKey($request));

        return back()->with('error', 'Email atau password salah. Silakan coba lagi.');
    }

    protected function ensureIsNotRateLimited(Request $request)
    {
        $maxAttempts = 5;

        if (RateLimiter::tooManyAttempts($this->throttleKey($request), $maxAttempts)) {
            $seconds = RateLimiter::availableIn($this->throttleKey($request));
            $minutes = ceil($seconds / 60);

            Log::channel('security')->warning('Rate limit exceeded for login attempts', [
                'email' => $request->input('email'),
                'ip' => $request->ip(),
                'attempts' => RateLimiter::attempts($this->throttleKey($request)),
                'available_in_seconds' => $seconds,
            ]);

            return back()
                ->with('warning', "Terlalu banyak percobaan login. Tunggu {$minutes} menit sebelum mencoba lagi.")
                ->onlyInput('email');
        }
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }

    public function logout(Request $request)
    {
        $userId = Auth::id();
        $userEmail = Auth::user()->email ?? 'unknown';

        Log::channel('auth')->info('User logout initiated', [
            'user_id' => $userId,
            'email' => $userEmail,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::channel('auth')->info('User logout completed', [
            'user_id' => $userId,
            'email' => $userEmail,
            'ip' => $request->ip(),
        ]);

        return redirect('/portal/login')->with('success', 'Anda telah logout dari sistem.');
    }

    
    protected function detectMaliciousInput(Request $request): bool
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        
        $maliciousPatterns = [
            '/[;&|`$(){}[\]\\\\]/', 
            '/\b(exec|system|shell_exec|passthru|eval|base64_decode)\b/i',  // Dangerous functions
            '/\b(rm|cat|ls|pwd|whoami|id|uname|wget|curl)\b/i',  // Common shell commands
            '/\$\{.*\}/',  // Variable expansion
            '/\$\(.*\)/',  // Command substitution
            '/`.*`/',      // Backtick execution
            '/<\?php/i',   // PHP tags
            '/<script/i',  // Script tags
            '/javascript:/i', // JavaScript protocol
            '/data:.*base64/i', // Data URLs with base64
        ];

        foreach ($maliciousPatterns as $pattern) {
            if (preg_match($pattern, $email) || preg_match($pattern, $password)) {
                return true;
            }
        }

        if (strlen($email) > 255 || strlen($password) > 255) {
            return true;
        }

        if (!mb_check_encoding($email, 'UTF-8') || !mb_check_encoding($password, 'UTF-8')) {
            return true;
        }

        return false;
    }

    
    protected function getSuspiciousPatterns(Request $request): array
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $suspicious = [];

        $patterns = [
            'shell_metacharacters' => '/[;&|`$(){}[\]\\\\]/',
            'dangerous_functions' => '/\b(exec|system|shell_exec|passthru|eval|base64_decode)\b/i',
            'shell_commands' => '/\b(rm|cat|ls|pwd|whoami|id|uname|wget|curl)\b/i',
            'variable_expansion' => '/\$\{.*\}/',
            'command_substitution' => '/\$\(.*\)/',
            'backtick_execution' => '/`.*`/',
            'php_tags' => '/<\?php/i',
            'script_tags' => '/<script/i',
            'javascript_protocol' => '/javascript:/i',
            'base64_data_url' => '/data:.*base64/i',
        ];

        foreach ($patterns as $name => $pattern) {
            if (preg_match($pattern, $email) || preg_match($pattern, $password)) {
                $suspicious[] = $name;
            }
        }

        return $suspicious;
    }
}
