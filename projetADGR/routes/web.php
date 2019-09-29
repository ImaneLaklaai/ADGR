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
    return view('welcome');
});
<<<<<<< HEAD

Route::post("/donsParGroupeSanguin", "ajaxHandlers@donsParGroupeSanguin");
Route::post("/donsParZone", "ajaxHandlers@donsParZone");

Route::post("/search", "ajaxHandlers@rechercheAvancee");

Route::post("/isapte", "ajaxHandlers@isApte");
=======
>>>>>>> 55d781575c9615aa586d86b2822828ede6be06c2
