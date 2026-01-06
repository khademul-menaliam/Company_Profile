<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'image',
        'title',
        'status',
    ];


    public function isVideo(): bool
    {
        return in_array(
            pathinfo($this->image, PATHINFO_EXTENSION),
            ['mp4', 'webm', 'ogg']
        );
    }
}
