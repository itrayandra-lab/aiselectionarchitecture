<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendLogToSystemJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 60;

    /**
     * Log data to send
     *
     * @var array
     */
    protected $logData;

    /**
     * Base URL of log system
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Domain identifier
     *
     * @var string
     */
    protected $domain;

    /**
     * Create a new job instance.
     */
    public function __construct($logData, $baseUrl, $domain)
    {
        $this->logData = $logData;
        $this->baseUrl = $baseUrl;
        $this->domain = $domain;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Send POST request to log system
            $response = Http::timeout(10)
                ->withHeaders([
                    'X-Domain' => $this->domain,
                    'Content-Type' => 'application/json',
                ])
                ->post($this->baseUrl . '/api/logs', $this->logData);

            // Check if request was successful
            if (!$response->successful()) {
                throw new \Exception('Log system returned error: ' . $response->status());
            }
        } catch (\Exception $e) {
            // Fallback to local log if HTTP request fails
            Log::channel('stack')->error('Failed to send log to external system', [
                'error' => $e->getMessage(),
                'log_data' => $this->logData,
            ]);

            // Don't retry if it's a client error (4xx)
            if (isset($response) && $response->clientError()) {
                return;
            }

            // Throw exception to trigger retry for server errors
            throw $e;
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        // Log the failure
        Log::channel('stack')->error('SendLogToSystemJob failed after all retries', [
            'error' => $exception->getMessage(),
            'log_data' => $this->logData,
        ]);
    }
}
