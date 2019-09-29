<?php

use Illuminate\Database\Seeder;
use App\Ville as Ville;
class villes_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ville::create([
            "libVille" => "Marrakech",
        ]);
        Ville::create([
            "libVille" => "Casablanca",
        ]);
    }
}
