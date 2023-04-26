<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Faker\Factory;
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
        $faker = Factory::create();

        // Generate 5 random clinicians
        for ($i = 0; $i < 10; $i++) {
            $clinician = new Doctor();
            $clinician->first_name = $faker->firstName;
            $clinician->last_name = $faker->lastName;
            $clinician->screen_name = $faker->userName;
            $clinician->email = $faker->email;
            $clinician->dob = $faker->date;
            $clinician->save();
        }
    }
}
