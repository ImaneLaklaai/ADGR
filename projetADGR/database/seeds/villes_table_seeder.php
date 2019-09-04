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
            "bureau_id" => "1"
        ]);
        Ville::create([
            "libVille" => "Casablanca",
            "bureau_id" => "1"
        ]);
    }
}
