<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image_url',
        'image_path',
        'alt_text',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if (! empty($this->image_path)) {
            if (Str::startsWith($this->image_path, ['http://', 'https://'])) {
                return $this->image_path;
            }

            return asset('storage/' . ltrim($this->image_path, '/'));
        }

        $rawUrl = (string) ($this->attributes['image_url'] ?? '');

        if ($rawUrl !== '' && ! Str::startsWith($rawUrl, ['http://', 'https://', '/'])) {
            return asset('storage/' . ltrim($rawUrl, '/'));
        }

        return $rawUrl;
    }
}