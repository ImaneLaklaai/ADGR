<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    public function benevoleEquipe(){
        return $this->hasMany("App\benevoleEquipe");
    }

    public function etatCivil(){
        return $this->hasOne("App\EtatCivil","id","etat_civil");
    }
}
