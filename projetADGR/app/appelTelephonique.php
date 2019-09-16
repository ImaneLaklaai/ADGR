<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appelTelephonique extends Model
{
    public function Benevole(){
        return $this->belongsTo("App\Benevole", "benevole_id", "id");
    }
}
