<?php

namespace App\Http\Controllers;

use App\Benevole;
use App\categorieDepense;
use App\Centre;
use App\Compte;
use App\Donneur;
use App\Ville;
use Doctrine\DBAL\Schema\Schema;
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
    public function advancedSearch(Request $request){
        if($request->recherche != "") {
            if ($request->motCle == "donneur"){
                if($request->option == "") {
                    $donneurq = Donneur::where("nom", "like", "%" . $request->recherche . "%")
                        ->orWhere("prenom", "like", "%" . $request->recherche . "%")
                        ->orWhere("dateNaissance", "like", "%" . $request->recherche . "%")
                        ->orWhere("email", "like", "%" . $request->recherche . "%")
                        ->orWhere("username", "like", "%" . $request->recherche . "%")
                        ->orWhere("CIN", "like", "%" . $request->recherche . "%")->get();
                }else{
                    $donneurq = Donneur::where($request->option, "like", "%" . $request->recherche . "%")->get();
                }
                return response(json_encode($donneurq));
            } elseif ($request->motCle == "benevole") {
                if($request->option == ""){
                    $benevoles = Benevole::where("nom", "like", "%" . $request->recherche . "%")
                        ->orWhere("prenom", "like", "%" . $request->recherche . "%")
                        ->orWhere("dateNaissance", "like", "%" . $request->recherche . "%")
                        ->orWhere("email", "like", "%" . $request->recherche . "%")
                        ->orWhere("username", "like", "%" . $request->recherche . "%")
                        ->orWhere("CIN", "like", "%" . $request->recherche . "%")->get();
                }else{
                    $benevoles = Benevole::where($request->option, "like", "%" . $request->recherche . "%")->get();
                }
                return response(json_encode($benevoles));
            }
        }
    }
}
