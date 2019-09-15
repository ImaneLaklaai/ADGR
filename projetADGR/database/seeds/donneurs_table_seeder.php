<?php

use Illuminate\Database\Seeder;
use App\Donneur as Donneur;
class donneurs_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donneur::create([
            "nom" => "Hssine",
            "prenom" => "Anwar",
            "CIN" => "EE835735",
            "numeroTelephone" => "0639212599",
            "numeroTelephoneSecondaire" => "0639212598",
            "dateNaissance" => "1998-10-05",
            "adresse" => "Adresse",
            "x" => "0",
            "y" => "0",
            "email" => "anwarhssine@gmail.com",
            "profession" => "Etudiant",
            "sexe" => "Homme",
            "etat" => "1",
            "dateDernierDon" => null,
            "nombreEnfants" => "0",
            "moyenAdhesion" => "Rencontre ADGR",
            "type" => "0",
            "remarque" => null,
            "etat_civil_id" => "1",
            "groupe_sanguin_id" => "1",
            "zone_id" => "2",
            "username" => "anwarhssine",
            "password" => bcrypt("123456789"),
        ]);
    }
}
