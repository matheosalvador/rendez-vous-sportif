<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        $sports = [
            'Football', 'Basketball', 'Tennis', 'Volleyball', 
            'Course de pied', 'Cyclisme', 'Natation', 'Rugby'
        ];

        foreach ($sports as $sportName) {
            Sport::create([
                'name' => $sportName,
                'slug' => Str::slug($sportName),
                'active' => true,
            ]);
        }
    }
}