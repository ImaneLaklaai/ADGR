<?php

namespace App\Http\Controllers;

use App\Benevole;
use App\categorieDepense;
use App\Centre;
use App\Compte;
use App\Ville;
use Illuminate\Http\Request;

class ajaxHandlers extends Controller
{
    public function CINTest(Request $request){
        return count(\App\Donneur::all()->where("CIN",$request->CIN));
    }
    public function getAllCities(){
        return json_encode(Ville::all());
    }
    public function getZones($id){
        return json_encode(Ville::find($id)->zone);
    }
    public function getAllCenters(){
        return json_encode(Centre::all());
    }
    public function accountLogs($id){
        $compte = Compte::find($id);
        return json_encode($compte->logs);
    }
    public function changeState(Request $request){
        $benevole = Benevole::find($request->idBenevole);
        $benevole->etat = $request->etat;
        $benevole->save();
    }
    public function expensesByCat($id){
        $compte = Compte::find($id);
        $expensesByCat = array();
        foreach(categorieDepense::all() as $cat){
            $myobj = ["cat_id"=>$cat->libelle, "cat_amount"=> count($compte->depenses()->get()->where("categorie_depense_id", "=", $cat->id))];
            array_push($expensesByCat, $myobj);
        }
        return json_encode($expensesByCat);
    }
}
