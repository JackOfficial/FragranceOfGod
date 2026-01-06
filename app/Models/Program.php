<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'icon',
        'is_published',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Use slug for route model binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Polymorphic media relationship
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Only image media
     */
    public function images()
    {
        return $this->media()->where('file_type', 'image');
    }

    /**
     * Only document media
     */
    public function documents()
    {
        return $this->media()->where('file_type', 'document');
    }

    public function focusAreas()
{
    return $this->morphToMany(FocusedArea::class, 'focusable');
}

    /**
     * Scope: published programs only
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
