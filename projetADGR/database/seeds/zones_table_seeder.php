<?php

use Illuminate\Database\Seeder;
use App\Zone as Zone;
class zones_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            "libZone" => "Targa",
            "codePostal" => "11",
            "ville_id" => "1"
        ]);
        Zone::create([
            "libZone" => "Daoudiate",
            "codePostal" => "12",
            "ville_id" => "1"
        ]);
        Zone::create([
            "libZone" => "Massira",
            "codePostal" => "13",
            "ville_id" => "1"
        ]);
        Zone::create([
            "libZone" => "Gueliz",
            "codePostal" => "14",
            "ville_id" => "1"
        ]);

        Zone::create([
            "libZone" => "Maarif",
            "codePostal" => "21",
            "ville_id" => "2"
        ]);
        Zone::create([
            "libZone" => "Oasis",
            "codePostal" => "22",
            "ville_id" => "2"
        ]);
        Zone::create([
            "libZone" => "Bourgogne",
            "codePostal" => "23",
            "ville_id" => "2"
        ]);
        Zone::create([
            "libZone" => "Belvedere",
            "codePostal" => "24",
            "ville_id" => "2"
        ]);
    }
}
