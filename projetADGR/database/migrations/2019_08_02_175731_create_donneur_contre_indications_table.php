<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonneurContreIndicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donneur_contre_indications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("donneur_id");
            $table->integer("contre_indication_id");
            $table->foreign("donneur_id")->references("id")->on("App\donneur_id");
            $table->foreign("contre_indication_id")->references("id")->on("App\contreIndication");
            $table->date("dateDebut");
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
        Schema::dropIfExists('donneur_contre_indications');
    }
}
