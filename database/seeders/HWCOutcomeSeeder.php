<?php

namespace Database\Seeders;

use App\Models\HWCOutcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HWCOutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $outcomes = [
            ['name' => 'Human death'],
            ['name' => 'Human Injury'],
            ['name' => 'Livestock killing'],
            ['name' => 'Livestock injury'],
            ['name' => 'Crop damage'],
            ['name' => 'Infrastructure damage'],
            ['name' => 'Retaliatory killing'],
            ['name' => 'Threat to human life'],
        ];

        foreach ($outcomes as $outcome) {
            HWCOutcome::create($outcome);
        }
    }
}
