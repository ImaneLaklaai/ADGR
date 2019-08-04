<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Donneur extends Model
{
    public function carte(){
        return $this->hasOne("App\Carte");
    }

    public function zone(){
        return $this->belongsTo("App\Zone");
    }

    public function donsADGR(){
        return $this->hasMany("App\donAdgr");
    }

    public function donsExternes(){
        return $this->hasMany("App\donExterne");
    }

    public function donneurContreIndications(){
        return $this->hasMany("App\DonneurContreIndication");
    }

    public function etatCivil(){
        return $this->belongsTo("App\EtatCivil");
    }
    public function groupeSanguin(){
        return $this->belongsTo("App\groupeSanguin");
    }
}
