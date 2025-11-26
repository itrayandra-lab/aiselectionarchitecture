<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = [
        'title',
        'type',
        'file_path',
        'youtube_url',
        'redirect_url',
        'is_active',
        'duration',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
