<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function bureau(){
        return $this->belongsTo("App\Bureau");
    }
    public function zone(){
        return $this->hasMany("App\Zone")->orderBy("libZone");
    }
}
