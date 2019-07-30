<?php

namespace App\Http\Controllers;

use App\Carte;
use Illuminate\Http\Request;

class CartesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Return view("pages.cartes.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.cartes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'donneur_id' => 'required',
        ]);

        $carte = new Carte();
        $carte->donneur_id = $request->input('donneur_id');
        $carte->etatCarte = "Créée";
        $carte->dateConception = date('Y-m-d');
        $carte->dateImpression = null;
        $carte->dateLivraison = null;
        $carte->save();
        return redirect('/carte')->with('success', 'Carte ajoutée');
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
        return view("pages.cartes.edit")->with("id", $id);
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
            'etatCarte' => 'required',
        ]);

        $carte = Carte::find($id);
//        $carte->donneur = $request->input('donneur');
        $carte->etatCarte = $request->input('etatCarte');
        if($request->input('etatCarte') === "Imprimée")
        {
            $carte->dateImpression = date('Y-m-d');
        }
        if($request->input('etatCarte') === "Livrée")
        {
            $carte->dateLivraison = date('Y-m-d');
        }
        $carte->save();
        return redirect('/carte')->with('success', 'Carte mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carte::find($id)->delete();
        return redirect("/carte")->with("success", "Carte supprimée");
    }
}
