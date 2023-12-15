<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HWCTrigger;
use App\Models\MitigationMeasure;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SpeciesSeeder::class,
            HWCOutcomeSeeder::class,
            HWCTypeSeeder::class,
            ControlMeasuresSeeder::class,
            //MitigationMeasure::class,
        ]);
    }
}
