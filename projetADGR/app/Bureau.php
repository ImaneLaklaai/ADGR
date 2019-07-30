<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    public function ville(){
        return $this->belongsTo("App\Ville");
    }
}
