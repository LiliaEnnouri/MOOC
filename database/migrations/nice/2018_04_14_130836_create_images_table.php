<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Images', function (Blueprint $table) {
            $table->increments('image_id');
            $table->string('nom');
            $table->string('titre');
            $table->string('is_profile');
            $table->integer('cours_id')->unsigned();
            $table->foreign("cours_id")->references("cours_id")->on("Cours");
            $table->softDeletes();
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
        Schema::dropIfExists('images');
    }
}
