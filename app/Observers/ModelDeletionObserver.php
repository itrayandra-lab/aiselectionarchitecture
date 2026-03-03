<?php

namespace App\Observers;

use App\Helpers\LogSystemHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ModelDeletionObserver
{
    /**
     * Sensitive fields to redact
     *
     * @var array
     */
    protected $sensitiveFields = [
        'password',
        'remember_token',
        'api_token',
        'secret',
        'secret_key',
        'private_key',
    ];

    /**
     * Handle the Model "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $this->logDeletion($model, 'deleted');
    }

    /**
     * Handle the Model "force deleted" event.
     */
    public function forceDeleted(Model $model): void
    {
        $this->logDeletion($model, 'force_deleted');
    }

    /**
     * Log the deletion
     */
    protected function logDeletion(Model $model, string $action): void
    {
        // Check if model should log deletion
        if (method_exists($model, 'shouldLogDeletion') && !$model->shouldLogDeletion()) {
            return;
        }

        // Get model information
        $modelClass = get_class($model);
        $tableName = $model->getTable();
        $primaryKey = $model->getKeyName();
        $primaryValue = $model->getKey();

        // Get all attributes
        $attributes = $model->getAttributes();

        // Get excluded fields from model
        $excludedFields = [];
        if (method_exists($model, 'getExcludedDeletionFields')) {
            $excludedFields = $model->getExcludedDeletionFields();
        }

        // Merge with default sensitive fields
        $fieldsToRedact = array_merge($this->sensitiveFields, $excludedFields);

        // Redact sensitive fields
        foreach ($fieldsToRedact as $field) {
            if (isset($attributes[$field])) {
                $attributes[$field] = '[REDACTED]';
            }
        }

        // Get user information
        $user = Auth::user();
        $userInfo = [
            'user_id' => $user ? $user->id : null,
            'user_email' => $user ? $user->email : null,
            'user_name' => $user ? $user->name : null,
        ];

        // Get request information
        $request = request();
        $requestInfo = [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
        ];

        // Prepare context
        $context = [
            'action' => $action,
            'model' => $modelClass,
            'table' => $tableName,
            'primary_key' => $primaryKey,
            'primary_value' => $primaryValue,
            'deleted_data' => $attributes,
            'timestamp' => now()->format('Y-m-d H:i:s'),
        ];

        // Add custom data if method exists
        if (method_exists($model, 'getCustomDeletionLogData')) {
            $context['custom_data'] = $model->getCustomDeletionLogData();
        }

        // Merge request info into context
        $context = array_merge($context, $requestInfo);

        // Log to local file
        Log::channel('deletion')->warning("Data dihapus dari {$tableName}", $context);

        // Send to Log System Global
        try {
            LogSystemHelper::warning(
                'deletion',
                "Data dihapus dari {$tableName}",
                $context,
                $userInfo
            );
        } catch (\Exception $e) {
            Log::channel('stack')->error('Failed to send deletion log to system', [
                'error' => $e->getMessage(),
                'model' => $modelClass,
                'primary_value' => $primaryValue,
            ]);
        }
    }
}
