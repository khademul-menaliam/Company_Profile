<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'applicant_name', 'email', 'phone', 'resume', 'cover_letter',
        'job_id', 'intern_id', 'status'
    ];

    public function job()
    {
        return $this->belongsTo(CareerJob::class, 'job_id');
    }

    public function internship()
    {
        return $this->belongsTo(CareerInternship::class, 'intern_id');
    }
}
