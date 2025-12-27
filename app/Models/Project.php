<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        // Basic
        'title',
        'slug',
        'location',
        'type',
        'timeline',

        // Content (Summernote)
        'description',
        'objectives',
        'solution',
        'technical_details',
        'results',
        'testimonial',

        // Media
        'image',

        // Relations / Meta
        'client_id',
        'status',
        'published_at',
    ];

    /**
     * Gallery images
     */
    public function gallery()
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Client relation
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
