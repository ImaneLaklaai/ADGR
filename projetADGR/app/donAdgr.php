<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donAdgr extends Model
{
    public function donneur(){
        return $this->belongsTo("App\Donneur");
    }
    public function collecte(){
        $collecte = collecte::find($this->collecte_id);
        if($collecte->type == 0){
            return $this->belongsTo("App\collecteMobile");
        }else{
            return $this->belongsTo("App\collecteFixe");
        }
    }
}
