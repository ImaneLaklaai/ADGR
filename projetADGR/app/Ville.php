<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function bureau(){
        return $this->hasOne("App\Bureau");
    }
    public function zone(){
        return $this->hasMany("App\Zone");
    }
}
