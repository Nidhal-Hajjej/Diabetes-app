<?php

namespace Database\Seeders;

use App\Models\Patient;
use Faker\Factory;
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
        $faker = Factory::create();

        // Generate 10 random patients
        for ($i = 0; $i < 10; $i++) {
            Patient::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => $faker->password,
                'screen_name' => $faker->userName,
                'dob' => $faker->date,
                'bio' => $faker->paragraph,
                'doctor_id' => $faker->numberBetween(1, 9),
                'measurements' => [
                    'bcg' => $faker->randomFloat(2, 0, 10),
                    'weight' => $faker->randomFloat(2, 40, 60) ,
                    'insulin' => $faker->randomFloat(2, 0, 10),
                    'exercise' => $faker->randomFloat(2, 0, 30),
                ],
            ]);
        }
    }
}
