<?php

namespace Database\Seeders;

use App\Models\Note;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Note::create([
                'patientId' =>$faker->randomDigit,
                'comment' =>$faker->sentence,
                'color' =>$faker->randomElement(['dark-yellow', 'light-yellow', 'dark-pink', 'light-pink']),    
            ]);
        };
    }
}
