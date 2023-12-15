<?php

namespace Database\Seeders;

use App\Models\HWCType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HWCTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = [
            ['name' => 'Human - Wildlife'],
            ['name' => 'Wildlife - Human'],
        ];

        foreach ($types as $type) {
            HWCType::create($type);
        }
    }
}
