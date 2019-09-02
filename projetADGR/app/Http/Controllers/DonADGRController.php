<?php

namespace App\Http\Controllers;

use App\donAdgr;
use App\Donneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DonADGRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.dons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'collecte' => 'required',
//            'typeCollecte' => 'required',
//            'donneur_id' => 'required',
//            'dateDon' => 'required',
//        ]);

        $don = new donAdgr();
        $don->collecte_id = $request->input('collecte');
        $don->donneur_id = $request->input('donneur');
        $don->dateDon = $request->input('dateDon');
        $donneur = Donneur::find($don->donneur_id);
        $donneur->dateDernierDon = $don->dateDon;
        $donneur->save();
        $don->save();
        return redirect('/don')->with('success', 'Don ajouté');
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
        return view("pages.dons.edit")->with("typeDon","ADGR")->with("id", $id);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        donAdgr::find($id)->delete();
        return Redirect::to("/don");
    }
}
