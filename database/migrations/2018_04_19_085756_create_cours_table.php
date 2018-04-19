<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('description');
            $table->float('nombre_heures');
            $table->integer('auteur_id')->unsigned();
            $table->integer('sujet_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('auteur_id')->references('id')->on('auteurs');
            $table->foreign('sujet_id')->references('id')->on('sujets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cours');
    }
}
