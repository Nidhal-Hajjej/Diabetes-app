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
                'screen_name' => $faker->userName,
                'dob' => $faker->date,
                'bio' => $faker->paragraph,
                'engagement_rate' => $faker->randomFloat(2, 0, 100),
                'clinicianId' => $faker->uuid,
                'supportMessage' => $faker->optional()->sentence,
                'measurements' => [
                    'bcg' => [
                        'minimum' => $faker->randomFloat(2, 0, 10),
                        'maximum' => $faker->randomFloat(2, 10, 20),
                    ],
                    'weight' => [
                        'minimum' => $faker->randomFloat(2, 40, 60),
                        'maximum' => $faker->randomFloat(2, 60, 100),
                    ],
                    'insulin' => [
                        'minimum' => $faker->randomFloat(2, 0, 10),
                        'maximum' => $faker->randomFloat(2, 10, 20),
                    ],
                    'exercise' => [
                        'minimum' => $faker->randomFloat(2, 0, 30),
                        'maximum' => $faker->randomFloat(2, 30, 60),
                    ],
                ],
            ]);
        }
    }
}
