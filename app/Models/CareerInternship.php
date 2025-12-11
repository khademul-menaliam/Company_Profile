<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerInternship extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'duration', 'location',
        'description', 'requirements', 'benefits', 'deadline', 'status'
    ];

    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'intern_id');
    }
}
