<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});
//Collecte:
Route::get("/collecte/","collecteController@index");
Route::get("/collecte/create", "collecteController@create");


//Collecte fixe:
Route::post("/collecte/fixe/store", "collecteFixeController@store");
Route::get("/collecte/fixe/edit/{id}","collecteFixeController@edit");
Route::get("/collecte/fixe/delete/{id}", "collecteFixeController@destroy");
Route::post("/collecte/fixe/update/{id}","collecteFixeController@update");


//Collecte mobile:
Route::post("/collecte/mobile/store", "collecteMobileController@store");
Route::get("/collecte/mobile/store", function(){
    return Redirect::to("/collecte");
});
Route::get("/collecte/mobile/delete/{id}", "collecteMobileController@destroy");
Route::get("/collecte/mobile/edit/{id}", "collecteMobileController@edit");
Route::post("/collecte/mobile/update/{id}", "collecteMobileController@update");

//Ville:
Route::get("/ville","Villecontroller@index");
Route::get("/ville/create","VilleController@create");
Route::post("/ville/store", "VilleController@store");
Route::get("/ville/edit/{id}","VilleController@edit");
Route::post("/ville/update/{id}","VilleController@update");
Route::get("/ville/delete/{id}","VilleController@destroy");

//Zone:
Route::get("/zone/","ZoneController@index");
Route::get("/zone/{idVille}","ZoneController@index");
Route::get("/zone/create/{idVille}","ZoneController@create");
Route::post("/zone/store","ZoneController@store");
Route::get("/zone/edit/{idZone}","ZoneController@edit");
Route::post("/zone/update/{idZone}","ZoneController@update");
Route::get("/zone/delete/{idZone}","ZoneController@destroy");

//Bureau:
Route::get("/bureau","BureauController@index");
Route::get("/bureau/create/","BureauController@create");
Route::get("/bureau/create/{idVille}","BureauController@create");
Route::post("/bureau/store/","BureauController@store");
Route::get("/bureau/delete/{idBureau}","BureauController@destroy");
Route::get("/bureau/edit/{idBureau}","BureauController@edit");
Route::post("/bureau/update/{idBureau}","BureauController@update");


//Centre:
Route::get("/centre","CentreController@index");
Route::get("/centre/create","CentreController@create");
Route::post("/centre/store","CentreController@store");
Route::get("/centre/edit/{idCentre}","CentreController@edit");
Route::post("/centre/update/{idCentre}","CentreController@update");
Route::get("/centre/delete/{idCentre}","CentreController@destroy");



//Cartes:
Route::get("/carte/", "CartesController@index");
Route::get("/carte/create", "CartesController@create");
Route::post("/carte/store","CartesController@store");
Route::get("/carte/show/{id}", "CartesController@show");
Route::get("/carte/edit/{id}", "CartesController@edit");
Route::post("/carte/update/{id}", "CartesController@update");
Route::get("/carte/delete/{id}", "CartesController@destroy");

//Donneurs:
Route::get("/donneur", "DonneurController@index");
Route::get("/donneur/create", "DonneurController@create");
Route::post("/donneur/store", "DonneurController@store");
Route::get("/donneur/show/{id}", "DonneurController@show");
Route::get("/donneur/edit/{id}", "DonneurController@edit");
Route::post("/donneur/update/{id}", "DonneurController@update");
Route::get("/donneur/delete/{id}", "DonneurController@destroy");
Route::get("/donneur/{id}/pdf", "DonneurController@export_pdf");

//Dons:
Route::get("/don/", "DonController@index");
Route::get("/don/create", "DonController@create");
Route::get("/don/{idDonneur}", "DonController@index");
Route::post("/don/store", "DonController@store");

//Dons ADGR:
Route::get("/don/adgr/delete/{id}","DonADGRController@destroy");
Route::get("/don/adgr/edit/{id}","DonADGRController@edit");
Route::post("/don/adgr/update/{id}","DonADGRController@update");
Route::post("/don/adgr/store/","DonADGRController@store");

//Dons externes:
Route::get("/don/externe/delete/{id}","DonExterneController@destroy");
Route::get("/don/externe/edit/{id}","DonExterneController@edit");
Route::post("/don/externe/update/{id}","DonExterneController@update");
Route::post("/don/externe/store/","DonExterneController@store");

//Contre indications:

Route::get("/contreIndication/","ContreIndicationController@index");
Route::get("/contreIndication/create","ContreIndicationController@create");
Route::post("/contreIndication/store","ContreIndicationController@store");
Route::get("/contreIndication/edit/{id}", "ContreIndicationController@edit");
Route::post("/contreIndication/update/{id}", "ContreIndicationController@update");
Route::get("/contreIndication/delete/{id}","ContreIndicationController@destroy");

//AJAX handlers
Route::get("/getZones/{id}", function($id){
    if(Request::ajax()){
        return json_encode(App\Ville::find($id)->zone);
    }else{
        return Redirect::to("/");
    }
});

Route::post("/cinTest", "ajaxHandlers@CINtest");
