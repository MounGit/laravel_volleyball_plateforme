<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            ContinentSeeder::class,
            RoleSeeder::class
        ]);
        Equipe::factory(5)->create();
        Joueur::factory(15)->create();
        Photo::factory(15)->create();
    }
}
