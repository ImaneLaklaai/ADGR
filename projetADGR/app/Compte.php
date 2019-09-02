<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    public function depenses(){
        return $this->hasMany("App\depense");
    }

    public function entrees(){
        return $this->hasMany("App\Entree");
    }

    public function logs(){
        return $this->hasMany("App\accountLog","compte_id");
    }

    public function retrait($montant = 0){
        if($montant > 0){
            $this->solde -= $montant;
        }
    }

    public function depos($montant){
        if($montant > 0){
            $this->solde += $montant;
        }
    }
}
