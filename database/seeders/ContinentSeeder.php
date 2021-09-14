<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("continents")->insert([
            [
                "name" => "Europe"
            ],
            [
                "name" => "Amérique"
            ],
            [
                "name" => "Asie"
            ],
            [
                "name" => "Afrique"
            ],
            [
                "name" => "Océanie"
            ]
        ]);


    }
}
