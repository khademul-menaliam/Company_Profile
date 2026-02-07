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
            ['mp4', 'webm', 'ogg','avi']
        );
    }
    public function getMimeType(): string
    {
        $ext = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));

        return match($ext) {
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'ogg' => 'video/ogg',
            'avi' => 'video/x-msvideo', // correct MIME for avi
            default => 'application/octet-stream',
        };
    }



}
