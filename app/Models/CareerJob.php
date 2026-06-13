<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CareerJob extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'type', 'location',
        'description', 'requirements', 'benefits', 'deadline', 'status'
    ];


    protected static function booted()
    {
        static::creating(function ($job) {

            if (empty($job->slug)) {

                $baseSlug = Str::slug($job->title);
                $departmentSlug = Str::slug($job->department);

                $slug = $baseSlug;
                $i = 0;

                while (static::where('slug', $slug)->exists()) {
                    if ($i === 0) {
                        $slug = $baseSlug . '-' . $departmentSlug;
                    } else {
                        $slug = $baseSlug . '-' . $departmentSlug . '-' . $i;
                    }
                    $i++;
                }

                $job->slug = $slug;
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'job_id');
    }
}
