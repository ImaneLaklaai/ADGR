<?php

namespace App\Http\Controllers;

use App\Donneur;
use Illuminate\Http\Request;


class DonneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.donneurs.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.donneurs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file("photo");
        if($file->getClientOriginalExtension() == 'jpg') {
            $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'required',
                'cin' => 'required|unique:donneurs',
                'numeroTelephone' => 'required',
                'groupe' => 'required',
            ]);
            $donneur = new Donneur();
            $donneur->nom = $request->input('nom');
            $donneur->prenom = $request->input('prenom');
            $donneur->CIN = $request->input('cin');
            $donneur->numeroTelephone = $request->input('numeroTelephone');
            $donneur->numeroTelephoneSecondaire = $request->input('numeroTelephoneSecondaire');
            $donneur->dateNaissance = $request->input('dateNaissance');
            $donneur->adresse = $request->input('adresse');
            $donneur->email = $request->input('email');
            $donneur->profession = $request->input('profession');
            $donneur->sexe = $request->input('sexe');
            $donneur->etat = $request->input('etat');
            $donneur->groupe_sanguin_id = $request->input('groupe');
            $donneur->dateDernierDon = $request->input('dateDernierDon');
            $donneur->etat_civil_id = $request->input('etatCivil');
            $donneur->nombreEnfants = $request->input('nombreEnfants');
            if ($request->type) {
                $donneur->type = 1;
            } else {
                $donneur->type = 0;
            }
            $donneur->x = 0;
            $donneur->y = 0;
            $donneur->carte_id = 0;
            $donneur->remarque = $request->input('remarque');
            $donneur->zone_id = $request->input('zone_id');
            $donneur->moyenAdhesion = $request->input("moyen");
            $donneur->save();
            $filename = $donneur->id. "." .$file->getClientOriginalExtension();
            $file->storeAs("public/profilePhotos", $filename);
        }
        return redirect('/donneur')->with('success', 'Donneur ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pages.donneurs.show")->with("id", $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.donneurs.edit")->with("id", $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'numeroTelephone' => 'required',
            'groupe' => 'required',
        ]);

        $donneur = Donneur::find($id);
        $donneur->nom = $request->input('nom');
        $donneur->prenom = $request->input('prenom');
        $donneur->CIN = $request->input('cin');
        $donneur->numeroTelephone = $request->input('numeroTelephone');
        $donneur->numeroTelephoneSecondaire = $request->input('numeroTelephoneSecondaire');
        $donneur->dateNaissance = $request->input('dateNaissance');
        $donneur->adresse = $request->input('adresse');
        $donneur->email = $request->input('email');
        $donneur->profession = $request->input('profession');
        $donneur->sexe = $request->input('sexe');
        $donneur->etat = $request->input('etat');
        $donneur->groupe = $request->input('groupe');
        $donneur->dateDernierDon = $request->input('dateDernierDon');
        $donneur->etat_civil_id = $request->input('etatCivil');
        $donneur->nombreEnfants = $request->input('nombreEnfants');
        if($request->type){
            $donneur->type = 1;
        }else{
            $donneur->type = 0;
        }
        $donneur->x = 0;
        $donneur->y = 0;
        $donneur->carte_id = 0;
        $donneur->remarque = $request->input('remarque');
        $donneur->zone_id = $request->input('zone_id');
        $donneur->save();
        return redirect('/donneur')->with('success', 'Donneur ajouté');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donneur = Donneur::find($id);
        $donneur->delete();
        return redirect('/donneur')->with('success', 'Donneur supprimé');
    }
}
