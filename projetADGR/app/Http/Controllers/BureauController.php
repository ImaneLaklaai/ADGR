<?php

namespace App\Http\Controllers;

use App\Bureau;
use App\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.bureau.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        return view("pages.bureau.nouveauBureau")->with("idVille", $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "ville_id"=>"required",
            "dateCreation"=>"required",
        ]);
        $bureau = new Bureau();
        $bureau->ville_id = $request->input("ville_id");
        $bureau->dateCreation = $request->input("dateCreation");
        $bureau->save();
        $ville = Ville::find($bureau->ville_id);
        $ville->bureau_id = $bureau->id;
        $ville->save();
        return Redirect::to("/bureau");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.bureau.modifierBureau")->with("idBureau", $id);
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
        $this->validate($request,[
            "ville_id"=>"required",
            "dateCreation"=>"required"
        ]);
        $bureau = Bureau::find($id);
        $ville = Ville::find($bureau->ville_id);
        $ville->bureau_id = null;
        $ville->save();
        $bureau->ville_id = $request->input("ville_id");
        $ville = Ville::find($bureau->ville_id);
        $ville->bureau_id = $bureau->id;
        $bureau->dateCreation = $request->input("dateCreation");
        $bureau->save();
        $ville->save();
        return Redirect::to("/bureau");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bureau = Bureau::find($id);
        $ville = Ville::find($bureau->ville->id);
        $bureau->delete();
        $ville->bureau_id = null;
        $ville->save();
        return Redirect::to("/bureau");
    }
}
