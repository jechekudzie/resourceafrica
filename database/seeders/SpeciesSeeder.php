<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $species = [
            ['name' => 'Elephant', 'scientific' => 'Elephas maximus, Loxodonta africana', 'male_name' => 'Bull', 'female_name' => 'Cow'],
            ['name' => 'Lion', 'scientific' => 'Panthera leo', 'male_name' => 'Lion', 'female_name' => 'Lioness'],
            ['name' => 'Leopard', 'scientific' => 'Panthera pardus', 'male_name' => 'Leopard', 'female_name' => 'Leopardess'],
            ['name' => 'Buffalo', 'scientific' => 'Syncerus caffer, Bubalus bubalis', 'male_name' => 'Bull', 'female_name' => 'Cow'],
            ['name' => 'Crocodile', 'scientific' => 'Crocodylus niloticus, Crocodylus porosus', 'male_name' => 'Bull', 'female_name' => 'Cow'],
            ['name' => 'Hippo', 'scientific' => 'Hippopotamus amphibius', 'male_name' => 'Bull', 'female_name' => 'Cow'],
            ['name' => 'Hyena - Spotted', 'scientific' => 'Crocuta crocuta', 'male_name' => 'Male Hyena', 'female_name' => 'Female Hyena'],
            ['name' => 'Hyena - Brown', 'scientific' => 'Hyaena brunnea', 'male_name' => 'Male Hyena', 'female_name' => 'Female Hyena'],
            ['name' => 'Wild Dogs', 'scientific' => 'Lycaon pictus', 'male_name' => 'Male', 'female_name' => 'Female'],
            ['name' => 'Jackal', 'scientific' => 'Canis aureus, Canis mesomelas', 'male_name' => 'Male', 'female_name' => 'Female'],
            ['name' => 'Snakes', 'scientific' => 'Varies by species', 'male_name' => 'Male', 'female_name' => 'Female'],
            ['name' => 'Python', 'scientific' => 'Python regius, Python bivittatus', 'male_name' => 'Male', 'female_name' => 'Female'],
            ['name' => 'Wild Pigs', 'scientific' => 'Sus scrofa', 'male_name' => 'Boar', 'female_name' => 'Sow'],
            ['name' => 'Antelopes', 'scientific' => 'Varies by species', 'male_name' => 'Buck', 'female_name' => 'Doe'],
            ['name' => 'Quelea Birds', 'scientific' => 'Quelea quelea', 'male_name' => 'Male Quelea', 'female_name' => 'Female Quelea'],
        ];

        foreach ($species as $specie) {
            Species::create($specie);
        }
    }
}
