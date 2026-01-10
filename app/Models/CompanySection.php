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

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->sort_order) {
                $model->sort_order =
                    self::where('section', $model->section)->max('sort_order') + 1;
            }
        });
    }
}
