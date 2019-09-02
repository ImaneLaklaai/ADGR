<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class collecteController extends Controller
{
    public function index(){
        return view("pages.collecte.index");
    }

    public function create(){
//        $centres = \App\Centre::all();
        return view("pages.collecte.nouvelleCollecte");
    }
}
