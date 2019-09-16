<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppelTelephoniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appel_telephoniques', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tele");
            $table->string("nom");
            $table->string("prenom");
            $table->integer("reponse")->nullable()->default(null);
            $table->integer("benevole_id")->unsigned()->index();
            $table->foreign("benevole_id")->references("id")->on("benevoles")->onDelete("cascade");
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
        Schema::dropIfExists('appel_telephoniques');
    }
}
