<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'name' => 'Patient',
            'gender' => 'male',
            'email' => 'admin@gmail.com',
            'dob'=> date('Y-m-d H:i:s'),
        ]);
        
        Patient::create([
            'name' => 'nidhal',
            'gender' => 'male',
            'email' => 'user@gmail.com',
            'dob'=> date('Y-m-d H:i:s'),
        
        ]);
    }
}
