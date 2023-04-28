<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Invitation;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Invitation::create([
                'patient_id' => $faker->numberBetween(1, 9),
                'doctor_id' => $faker->numberBetween(1, 9),
            ]);
        };
    }
}
