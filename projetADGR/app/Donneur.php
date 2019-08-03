<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donneur extends Model
{
    public function carte(){
        return $this->hasOne("carte");
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
        return $this->belongsTo("App\etatCivil");
    }
    public function groupeSanguin(){
        return $this->belongsTo("App\groupeSanguin");
    }
}
