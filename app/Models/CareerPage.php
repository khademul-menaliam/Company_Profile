<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPage extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'content', 'banner_image', 'status'
    ];
}
