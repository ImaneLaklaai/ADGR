<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonAdgrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_adgrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collecte_id');
            $table->integer('donneur_id');
            $table->date('dateDon');
            $table->foreign("donneur_id")->references("id")->on("App\Donneur");
            $table->foreign("collecte_id")->references("id")->on("App\Collecte");
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
        Schema::dropIfExists('don_adgrs');
    }
}
