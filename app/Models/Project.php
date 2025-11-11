<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'client_id',
        'published_at',
        'status',
    ];

    public function gallery()
    {
        return $this->hasMany(ProjectImage::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
