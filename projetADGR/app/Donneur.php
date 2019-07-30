<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donneur extends Model
{
    public function carte(){
        return $this->hasOne("carte");
    }

    public function dons(){
        return $this->hasMany("App\Don");
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
}
