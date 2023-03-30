<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name' => 'Doctor',
            'gender' => 'male',
            'email' => 'admin@gmail.com',
            'dob'=> date('Y-m-d H:i:s'),
            // 'password' => bcrypt('123456'),
        ]);
    }
}
