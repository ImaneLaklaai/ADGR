<?php

namespace App\Http\Controllers;

use App\collecte;
use App\collecteFixe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class collecteFixeController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'libCollecte'=>'required',
            'dateCollecte' =>'required',
            'idCentre' =>'required',
        ]);
            $collecte = new collecteFixe();
            $collecte->libCollecte = $request->input("libCollecte");
            $collecte->date = $request->input("dateCollecte");
            $collecte->centre_id = $request->input("idCentre");
            $collecte->save();
            $collecte2 = new collecte();
            $collecte2->collecte_id = $collecte->id;
            $collecte2->typeCollecte = 1;
            $collecte2->save();
            return view("pages.collecte.nouvelleCollecte")->with(["sucess"=>true]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        return view("pages.collecte.modifierCollecteFixe")->with("idCollecte",$id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'libCollecte'=>'required',
            'dateCollecte' =>'required',
            'idCentre' =>'required',
        ]);
        $collecte = collecteFixe::find($id);
        $collecte->libCollecte = $request->input("libCollecte");
        $collecte->date = $request->input("dateCollecte");
        $collecte->centre_id = $request->input("idCentre");
        $collecte->save();
        return Redirect::to('/collecte');
    }
    public function destroy($id)
    {
        collecteFixe::find($id)->delete();
        return Redirect::to('/collecte');
    }
}
