<?php

namespace Database\Seeders;

use App\Models\ControlMeasure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ControlMeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $measures = [
            ['name' => 'Killed', 'type' => 'number'],
            ['name' => 'Relocated', 'type' => 'number'],
            ['name' => 'Spraying', 'type' => 'drones'],
            ['name' => 'Nets', 'type' => 'physical'],
            ['name' => 'Chilli bombs', 'type' => 'physical'],
            ['name' => 'Fireworks', 'type' => 'auditory'],
            ['name' => 'Gunshots', 'type' => 'auditory'],
            ['name' => 'Drums', 'type' => 'auditory'],
            ['name' => 'Abrupt darting', 'type' => 'physical'],
            ['name' => 'Flash lights', 'type' => 'visual'],
            ['name' => 'Traps', 'type' => 'physical']
        ];

        foreach ($measures as $measure) {
            ControlMeasure::create($measure);
        }
    }
}
