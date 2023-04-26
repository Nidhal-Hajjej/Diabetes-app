<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'screen_name',
        'dob',
        'bio',
        'doctor_id',
        'supportMessage',
        'measurements',
    ];

    protected $casts = [
        'measurements' => 'json',
    ];

    protected $table = 'patients';
}
