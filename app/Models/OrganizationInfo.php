<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'slogan',
        'about',
        'mission',
        'vision',
        'values',
        'objectives',
        'email',
        'phone',
        'physical_address',
        'social_media',
        'is_active',
    ];

    protected $casts = [
        'social_media' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * All media (logos, documents, etc.)
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Organization logos
     */
    public function logos(): MorphMany
    {
        return $this->media()->where('file_type', 'image');
    }

    /**
     * Organization documents (policies, certificates, reports)
     */
    public function documents(): MorphMany
    {
        return $this->media()->where('file_type', 'document');
    }
}
