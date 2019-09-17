<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;

class collecteController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:benevole");
    }
    public function index(){
        return view("pages.collecte.index");
    }

    public function export_all_pdf(){
        $pdf = PDF::loadView("pages.collecte.printlist");
        return $pdf->download("ListeDonneurs.pdf");
    }

    public function create(){
//        $centres = \App\Centre::all();
        return view("pages.collecte.nouvelleCollecte");
    }
}
