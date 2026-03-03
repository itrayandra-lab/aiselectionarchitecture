<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unique_section',
        'order',
        'content',
        'is_active',
    ];

    protected $casts = [
        'content' => 'array', // Automatically cast JSON to array
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk mendapatkan section yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mendapatkan section berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Get section by unique identifier
     */
    public static function getByUnique($uniqueSection)
    {
        return self::where('unique_section', $uniqueSection)->first();
    }

    /**
     * Get active sections ordered
     */
    public static function getActiveSections()
    {
        return self::active()->ordered()->get();
    }
}
