<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FocusedArea extends Model
{
    use SoftDeletes;

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
     * Casts
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /* ===============================
     |  MEDIA (POLYMORPHIC)
     |  Images & Documents
     =============================== */

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function images()
    {
        return $this->media()->where('file_type', 'image');
    }

    public function documents()
    {
        return $this->media()->where('file_type', 'document');
    }

    /* ===============================
     |  RELATIONS TO CONTENT
     |  Programs, Stories, Events
     =============================== */

    public function programs()
    {
        return $this->morphedByMany(Program::class, 'focusable');
    }

    public function stories()
    {
        return $this->morphedByMany(Story::class, 'focusable');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'focusable');
    }

    /* ===============================
     |  SCOPES
     =============================== */

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /* ===============================
     |  ROUTE MODEL BINDING BY SLUG
     =============================== */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
