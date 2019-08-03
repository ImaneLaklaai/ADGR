<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxHandlers extends Controller
{
    public function CINTest(Request $request){
        return count(\App\Donneur::all()->where("CIN",$request->CIN));
    }
}
