<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CareerInternship extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'duration', 'location',
        'description', 'requirements', 'benefits', 'deadline', 'status'
    ];

    protected static function booted()
    {
        static::creating(function ($internship) {

            if (empty($internship->slug)) {

                $baseSlug = Str::slug($internship->title);
                $departmentSlug = Str::slug($internship->department);

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

                $internship->slug = $slug;
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'intern_id');
    }
}
