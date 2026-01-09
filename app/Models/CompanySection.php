<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySection extends Model
{
    protected $fillable = [
        'section',
        'type',
        'title',
        'subtitle',
        'name',
        'content',
        'image',
        'status',
        'sort_order',
    ];
}
