<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'event_date',
        'event_time',
        'is_published',
    ];

    protected $casts = [
    'event_date' => 'date', // now $event->event_date will be a Carbon instance
    ];

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
}
