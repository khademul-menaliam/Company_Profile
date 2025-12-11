<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerJob extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'type', 'location',
        'description', 'requirements', 'benefits', 'deadline', 'status'
    ];

    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'job_id');
    }
}
