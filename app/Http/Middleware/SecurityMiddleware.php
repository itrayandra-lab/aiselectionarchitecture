<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SecurityMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log semua request yang masuk
        Log::channel('security')->info('Incoming request', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'user_id' => auth()->id(),
        ]);

        // Deteksi serangan XSS dan SQL Injection
        if ($this->detectMaliciousInput($request)) {
            Log::channel('security')->error('Malicious input detected', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'input' => $request->except(['password', 'password_confirmation']),
                'suspicious_patterns' => $this->getSuspiciousPatterns($request),
            ]);

            return response()->json([
                'error' => 'Malicious input detected. Request blocked.'
            ], 403);
        }

        return $next($request);
    }

    /**
     * Deteksi input berbahaya
     */
    protected function detectMaliciousInput(Request $request): bool
    {
        $inputs = $request->except(['password', 'password_confirmation']);
        
        foreach ($inputs as $key => $value) {
            if (is_string($value) && $this->containsMaliciousPattern($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Cek apakah string mengandung pattern berbahaya
     */
    protected function containsMaliciousPattern(string $input): bool
    {
        $maliciousPatterns = [
            // Shell injection patterns
            '/[;&|`$(){}[\]\\\\]/',
            '/\b(exec|system|shell_exec|passthru|eval|base64_decode)\b/i',
            '/\b(rm|cat|ls|pwd|whoami|id|uname|wget|curl|nc|netcat)\b/i',
            '/\$\{.*\}/',
            '/\$\(.*\)/',
            '/`.*`/',
            
            // SQL injection patterns
            '/(\bUNION\b|\bSELECT\b|\bINSERT\b|\bUPDATE\b|\bDELETE\b|\bDROP\b)/i',
            '/(\bOR\b|\bAND\b)\s+\d+\s*=\s*\d+/i',
            '/[\'";]\s*(OR|AND)\s+[\'"]?\d+[\'"]?\s*=\s*[\'"]?\d+/i',
            
            // XSS patterns
            '/<script[^>]*>.*?<\/script>/is',
            '/javascript:/i',
            '/on\w+\s*=/i',
            '/<iframe[^>]*>.*?<\/iframe>/is',
            
            // PHP code injection
            '/<\?php/i',
            '/<\?=/i',
            '/\beval\s*\(/i',
            '/\bassert\s*\(/i',
            
            // Path traversal
            '/\.\.\//',
            '/\.\.\\\\/',
            
            // Data URLs with base64
            '/data:.*base64/i',
        ];

        foreach ($maliciousPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Mendapatkan pattern mencurigakan yang terdeteksi
     */
    protected function getSuspiciousPatterns(Request $request): array
    {
        $inputs = $request->except(['password', 'password_confirmation']);
        $suspicious = [];

        $patterns = [
            'shell_metacharacters' => '/[;&|`$(){}[\]\\\\]/',
            'dangerous_functions' => '/\b(exec|system|shell_exec|passthru|eval|base64_decode)\b/i',
            'shell_commands' => '/\b(rm|cat|ls|pwd|whoami|id|uname|wget|curl|nc|netcat)\b/i',
            'sql_injection' => '/(\bUNION\b|\bSELECT\b|\bINSERT\b|\bUPDATE\b|\bDELETE\b|\bDROP\b)/i',
            'xss_script' => '/<script[^>]*>.*?<\/script>/is',
            'php_tags' => '/<\?php/i',
            'path_traversal' => '/\.\.\//',
            'javascript_protocol' => '/javascript:/i',
        ];

        foreach ($inputs as $key => $value) {
            if (is_string($value)) {
                foreach ($patterns as $name => $pattern) {
                    if (preg_match($pattern, $value)) {
                        $suspicious[] = $name;
                    }
                }
            }
        }

        return array_unique($suspicious);
    }
}