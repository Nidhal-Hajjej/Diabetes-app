<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'screen_name',
        'dob',
        'patients',
    ];

    protected $hidden = [
        'password',
    ];
    // protected $casts = [
    //     'patients' => 'array',
    // ];
}
