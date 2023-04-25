<?php

namespace Database\Seeders;

use App\Models\Measurement;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Measurement::create([
                'bloodLevel' =>$faker->randomDigit,
                'weight' =>$faker->randomDigit,
                'exercise' =>$faker->randomDigit,
                'insulinDoses' =>$faker->randomDigit,

            ]);
        };
    }
}
