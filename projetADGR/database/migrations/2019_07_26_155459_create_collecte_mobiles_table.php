<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollecteMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collecte_mobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->string("libCollecte");
            $table->string("x");
            $table->string("y");
            $table->string("lieu");
            $table->integer("zone_id");
            $table->foreign("zone_id")->references("id")->on("App\Zone")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('collecte_mobiles');
    }
}
