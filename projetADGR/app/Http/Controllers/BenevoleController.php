<?php

namespace App\Http\Controllers;

use App\Benevole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PDF;

class BenevoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
//        $this->middleware("auth:benevole")->except( ["getLoginForm", "login"]);
    }

    public function getLoginForm(){
        return view("auth.login");
    }
    public function login(Request $request){
        //Validate:
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required",
        ]);
        //Login:
        if(Auth::attempt(["email" => $request->email,"password" => $request->password],true)){
            return redirect()->to("/benevole");
        }
        return redirect()->back();

    }
    public function index()
    {
        $benevoles = Benevole::paginate(10);
        return view("pages.Benevole.index")->with("benevoles", $benevoles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.Benevole.create");
    }


    public function export_pdf($id)
    {
        $benevole = Benevole::find($id); //Chargement des informations depuis la base de données
        $pdf = PDF::loadView('pages.benevole.printable', $benevole ); //Envoi des informations à la vue concernée
        return $pdf->download($benevole ->nom.$benevole ->prenom.time().'.pdf');
    }

    public function export_all_pdf(){
        $pdf = PDF::loadView("pages.benevole.printlist");
        return $pdf->download("ListeBenevoles.pdf");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $benevole = new Benevole();
        $benevole->nom = $request->input("nom");
        $benevole->prenom = $request->input("prenom");
        $benevole->CIN = $request->input("CIN");
        $benevole->tele = $request->input("tele");
        $benevole->teleSec = $request->input("teleSec");
        $benevole->dateNaissance = $request->input("dateNaissance");
        $benevole->adresse = $request->input("adresse");
        $benevole->x = 0;
        $benevole->y = 0;
        $benevole->email = $request->input("email");
        $benevole->profession = $request->input("profession");
        $benevole->sexe = $request->input("sexe");
        $benevole->dateAdhesion = $request->input("dateAdhesion");
        $benevole->login = $request->input("login");
        $benevole->password = $request->input("password");
        $benevole->etat = true;
        $benevole->etat_civil = $request->input("etatCivil");
        $benevole->droitAcces = false;
        $benevole->save();
        if($request->file("photo")){
            $filename = $benevole->id.".".$request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->storeAs("public/profilePhotos/benevoles",$filename);
        }
        return Redirect::to('/benevole');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pages.Benevole.show")->with("id", $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.benevole.edit")->with("id", $id);
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
        $benevole = Benevole::find($id);
        $benevole->nom = $request->input("nom");
        $benevole->prenom = $request->input("prenom");
        $benevole->CIN = $request->input("CIN");
        $benevole->tele = $request->input("tele");
        $benevole->teleSec = $request->input("teleSec");
        $benevole->dateNaissance = $request->input("dateNaissance");
        $benevole->adresse = $request->input("adresse");
        $benevole->x = 0;
        $benevole->y = 0;
        $benevole->email = $request->input("email");
        $benevole->profession = $request->input("profession");
        $benevole->sexe = $request->input("sexe");
        $benevole->dateAdhesion = $request->input("dateAdhesion");
        $benevole->login = $request->input("login");
        $benevole->password = $request->input("password");
        $benevole->etat = true;
        $benevole->etat_civil = $request->input("etatCivil");
        $benevole->droitAcces = false;
        $benevole->save();
        if($request->file("photo")){
            $filename = $benevole->id.".".$request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->storeAs("public/profilePhotos/benevoles",$filename);
        }
        return Redirect::to('/benevole');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Benevole::find($id)->delete();
        Storage::delete("public/profilePhotos/benevoles/".$id.".jpg");
        return Redirect::to("/benevole");
    }
}
