<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware("auth:donneur,benevole");
    }

    public function index()
    {
        return view("pages.Messages.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.Messages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new \App\Message();
        $message->donneur_id = $request->donneur;
        $message->objet = $request->objet;
        $message->contenu = $request->contenu;
        $message->status = 1;
        $message->save();
        return redirect()->to("/message");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pages.Messages.show")->with("id", $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    public function answer(Request $request, $id){
        $message = Message::find($id);
        $message->reponse = $request->reponse;
        $message->benevole_id = Auth::user()->id;
        $message->status = 2;
        $message->date_reponse = new \DateTime(date("Y-m-d H:i:s"));
        $message->save();
        return redirect("/message/show/".$message->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        if(Auth::guard("donneur")->check()){
            if($message->donneur->id == Auth::user()->id){
                $message->delete();
            }
        }else{
            if(Auth::user()->role->id == 1){
                $message->delete();
            }elseif(Auth::user()->role->id == 2){
                if($message->donneur->zone->ville->id == Auth::user()->zone->ville->id){
                    $message->delete();
                }
            }
        }
        return redirect("/message");
    }
}
