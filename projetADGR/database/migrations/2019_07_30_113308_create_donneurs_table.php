<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donneurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('CIN');
            $table->string('numeroTelephone');
            $table->string('numeroTelephoneSecondaire')->nullable()->default(null);
            $table->date('dateNaissance');
            $table->string('adresse');
            $table->string('x')->default('0');;
            $table->string('y')->default('0');
            $table->string('email');
            $table->string('profession');
            $table->string('sexe');
            $table->boolean('etat');
            $table->date('dateDernierDon')->nullable()->default(null);
            $table->integer('nombreEnfants')->nullable()->default(null);
            $table->string("moyenAdhesion");
            $table->boolean('type');
            $table->mediumText('remarque')->nullable()->default(null);;
            $table->string('etatCivil_id');
            $table->foreign('etatCivil_id')->references("id")->on("App\\etatCivil");
            $table->string('groupe_sanguin_id');
            $table->foreign("groupe_sanguin_id")->references("id")->on("App\groupeSanguin");
            $table->integer('zone_id');
            $table->foreign('zone_id')->references("id")->on("App\Zone");
            $table->integer('carte_id')->nullable()->default(null);
            $table->foreign("carte_id")->references("id")->on("App\carte");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donneurs');
    }
}
