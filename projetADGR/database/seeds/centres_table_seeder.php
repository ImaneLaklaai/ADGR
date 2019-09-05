<?php

use Illuminate\Database\Seeder;
use App\Centre as Centre;
class centres_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Centre::create([
            "adresse" => "Adresse Centre",
            "x" => "0",
            "y" => "0",
            "libCentre" => "CRTS",
            "zone_id" => "1",
        ]);
    }
}
