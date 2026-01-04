<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes; // <-- add SoftDeletes

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author_id',
        'is_published',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
