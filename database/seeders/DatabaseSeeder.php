<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DoctorSeeder::class,
            PatientSeeder::class,
            NoteSeeder::class,
            MeasurementSeeder::class,
            InvitationSeeder::class,
        ]);
    }
}
