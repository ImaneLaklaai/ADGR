<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureaus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("dateCreation");
            $table->integer("ville_id")->unsigned()->index();
            $table->foreign("ville_id")->references("id")->on("App\Ville")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("responsable_id")->unsigned()->index();
            $table->foreign("responsable_id")->references("id")->on("App\Benevole")->onDelete("cascade");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bureaus');
    }
}
