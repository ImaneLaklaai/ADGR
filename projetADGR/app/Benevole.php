<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    public function benevoleEquipe(){
        return $this->hasMany("App\benevoleEquipe");
    }
}
