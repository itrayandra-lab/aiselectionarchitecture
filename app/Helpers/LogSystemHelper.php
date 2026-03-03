<?php

namespace App\Helpers;

use App\Jobs\SendLogToSystemJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogSystemHelper
{
    /**
     * Send log to external system
     *
     * @param string $level
     * @param string $category
     * @param string $message
     * @param array $context
     * @param array $userData
     * @return void
     */
    public static function send($level, $category, $message, $context = [], $userData = [])
    {
        // Check if log system is enabled
        if (!config('logging.log_system.enabled', false)) {
            return;
        }

        // Get request information
        $request = request();
        
        // Prepare log data
        $logData = [
            'level' => $level,
            'category' => $category,
            'message' => $message,
            'context' => $context,
            'user_id' => $userData['user_id'] ?? (Auth::check() ? Auth::id() : null),
            'user_email' => $userData['user_email'] ?? (Auth::check() ? Auth::user()->email : null),
            'user_name' => $userData['user_name'] ?? (Auth::check() ? Auth::user()->name : null),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'timestamp' => now()->format('Y-m-d H:i:s'),
        ];

        // Get configuration
        $baseUrl = config('logging.log_system.url');
        $domain = config('logging.log_system.domain');

        try {
            // Dispatch job to queue
            SendLogToSystemJob::dispatch($logData, $baseUrl, $domain);
        } catch (\Exception $e) {
            // Fallback to local log if queue dispatch fails
            Log::channel('stack')->error('Failed to dispatch log job', [
                'error' => $e->getMessage(),
                'log_data' => $logData,
            ]);
        }
    }

    /**
     * Log emergency message
     */
    public static function emergency($category, $message, $context = [], $userData = [])
    {
        self::send('emergency', $category, $message, $context, $userData);
    }

    /**
     * Log alert message
     */
    public static function alert($category, $message, $context = [], $userData = [])
    {
        self::send('alert', $category, $message, $context, $userData);
    }

    /**
     * Log critical message
     */
    public static function critical($category, $message, $context = [], $userData = [])
    {
        self::send('critical', $category, $message, $context, $userData);
    }

    /**
     * Log error message
     */
    public static function error($category, $message, $context = [], $userData = [])
    {
        self::send('error', $category, $message, $context, $userData);
    }

    /**
     * Log warning message
     */
    public static function warning($category, $message, $context = [], $userData = [])
    {
        self::send('warning', $category, $message, $context, $userData);
    }

    /**
     * Log notice message
     */
    public static function notice($category, $message, $context = [], $userData = [])
    {
        self::send('notice', $category, $message, $context, $userData);
    }

    /**
     * Log info message
     */
    public static function info($category, $message, $context = [], $userData = [])
    {
        self::send('info', $category, $message, $context, $userData);
    }

    /**
     * Log debug message
     */
    public static function debug($category, $message, $context = [], $userData = [])
    {
        self::send('debug', $category, $message, $context, $userData);
    }
}
