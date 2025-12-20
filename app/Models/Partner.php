<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default (plural of the model name)
    protected $table = 'partners';

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'name',
        'description',
        'website_url',
        'email',
        'phone',
        'logo',
        'status',
    ];

    // Optionally, add relationships here (e.g., many-to-many with another model)
}
