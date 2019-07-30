<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    public function donneur(){
        return $this->belongsTo("App\Donneur");
    }

//    public function collecte(){
//        return $this->belongsTo()
//    }
}
