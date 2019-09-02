<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    public function villes(){
        return $this->hasMany("App\Ville");
    }
}
