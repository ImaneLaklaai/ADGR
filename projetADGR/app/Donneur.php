<?php

namespace App;

use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Donneur extends Model
{
    public function carte()
    {
        return $this->hasOne("App\Carte");
    }

    public function zone()
    {
        return $this->belongsTo("App\Zone");
    }

    public function donsADGR()
    {
        return $this->hasMany("App\donAdgr");
    }

    public function donsExternes()
    {
        return $this->hasMany("App\donExterne");
    }

    public function donneurContreIndications()
    {
        return $this->hasMany("App\DonneurContreIndication");
    }

    public function etatCivil()
    {
        return $this->belongsTo("App\EtatCivil");
    }

    public function groupeSanguin()
    {
        return $this->belongsTo("App\groupeSanguin");
    }

    /* getProchainDon() retourne :
     *    Soit DateTime() : la date du prochain don
     *    Soit : null si la date du prochain don est inférieur à la date d'aujourd'hui
     *    Soit : 01-01-2000 si l'inaptitude est définitive donc pas de prochains dons
     */
    public function getProchainDon()
    {
        $ci = donneurContreIndication::all()->where("donneur_id","=", $this->id);

        $prochain = null;
        if($this->dateDernierDon != null) {
            $dernierDon = new \DateTime($this->dateDernierDon);
            $prochain = $dernierDon->add(\DateInterval::createFromDateString("3 months")); //$prochain: Prochain don en ajoutant 3 mois à la date du dernier don
        }


        if (count($ci) >  0) {
            $prochain2 = new \DateTime(Date("01-01-2000")); //$prochain2: Prochain don en se basant sur la contre-indication ayant la date de fin la plus lointaine
            foreach ($ci as $contreI) {
                if($contreI->contreIndication->type == "definitive") return "01-01-2000";
                $dateFin = new \DateTime($contreI->dateFin()->format("d-m-Y"));
                if ($dateFin->format("d-m-Y") > $prochain2->format("d-m-Y")) {
                    $prochain2 = $dateFin;
                }
            }
            if ($prochain < $prochain2) {
                $currentDate = new \DateTime(date("d-m-Y"));
                if($prochain2 < $currentDate){
                    return null;
                }else{
                    return $prochain2;
                }
            }
        }

        if($prochain == null){
            return null;
        }else{
            $currentDate = new \DateTime(date("d-m-Y"));
            if($prochain < $currentDate){
                return null;
            }else{
                return $prochain;
            }
        }
    }

    public function isApte(){
        $currentDate = new \DateTime(date("d-m-Y"));
        if(is_string($this->getProchainDon())) return false;
        if ($this->getProchainDon() > $currentDate) {
            return false;
        }
        return true;
    }
}