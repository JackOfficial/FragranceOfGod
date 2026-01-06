<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'description',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Polymorphic media relation
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Only images
     */
    public function images()
    {
        return $this->media()->where('file_type', 'image');
    }

    /**
     * Only documents
     */
    public function documents()
    {
        return $this->media()->where('file_type', 'document');
    }

    /**
     * Project cover image (used in index blade)
     */
    public function coverImage()
    {
        return $this->images()->where('is_cover', true)->first();
    }

    /**
     * Focus areas (polymorphic many-to-many)
     */
    public function focusAreas()
    {
        return $this->morphToMany(FocusedArea::class, 'focusable');
    }
}
