<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenevolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benevoles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nom");
            $table->string("prenom");
            $table->string("CIN");
            $table->string("tele");
            $table->string("teleSec")->nullable()->default(null);;
            $table->date("dateNaissance");
            $table->string("adresse");
            $table->string("x")->default('0');
            $table->string("y")->default('0');
            $table->string("email");
            $table->string("profession");
            $table->string("sexe");
            $table->date("dateAdhesion");
            $table->string("login");
            $table->string("password");
            $table->boolean("etat")->default(true);
            $table->boolean('droitAcces')->default(false);
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
        Schema::dropIfExists('benevoles');
    }
}
