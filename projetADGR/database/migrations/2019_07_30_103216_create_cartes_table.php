<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('etatCarte');
            $table->date('dateConception');
            $table->date('dateImpression')->nullable()->default(null);
            $table->date('dateLivraison')->nullable()->default(null);
            $table->string('donneur_id');
            $table->foreign("donneur_id")->references("id")->on("App\Donneur");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartes');
    }
}
