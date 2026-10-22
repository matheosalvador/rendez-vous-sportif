<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //  lance le seeder des sports (indispensable pour que les événements puissent en piocher un)
        $this->call([
            SportSeeder::class,
        ]);

        //  crée admin global
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
        ]);

        // crée un collectif manuellement 
        $organization = Organization::create([
            'name' => 'Le Collectif Sportif',
            'slug' => 'le-collectif-sportif',
            'plan' => 'free',
        ]);

        //  utilise directement EventFactory pour générer 10 événements et on les force à utiliser notre collectif
        Event::factory(10)->create([
            'organization_id' => $organization->id
        ]);
    }
}