<?php

namespace App\Http\Controllers;

use App\Carte;
use App\Donneur;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;


class DonneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_pdf($id)
    {
        $donneur = Donneur::find($id); //Chargement des informations depuis la base de données
        $pdf = PDF::loadView('pages.donneurs.printable', $donneur); //Envoi des informations à la vue concernée
        return $pdf->download($donneur->nom.$donneur->prenom.time().'.pdf');
    }

    public function export_all_pdf(){
        $pdf = PDF::loadView("pages.donneurs.printlist");
        return $pdf->download("ListeDonneurs.pdf");
    }
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
            $donneur->remarque = $request->input('remarque');
            $donneur->zone_id = $request->input('zone_id');
            $donneur->moyenAdhesion = $request->input("moyen");
            $donneur->save();
            $filename = $donneur->id. "." .$file->getClientOriginalExtension();
            $file->storeAs("public/profilePhotos/donneurs/", $filename);
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
        $donneur->groupe_sanguin_id = $request->input('groupe');
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
        Storage::delete("public/profilePhotos/donneurs/".$donneur->id.".jpg");
        $donneur->delete();
        return redirect('/donneur')->with('success', 'Donneur supprimé');
    }
}
