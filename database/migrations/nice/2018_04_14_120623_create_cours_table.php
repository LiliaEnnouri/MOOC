<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cours', function (Blueprint $table) {

            $table->increments('cours_id');
            $table->string('label');
            $table->string('description');
            $table->double('nombre_heures');

            $table->integer('auteur_id')->unsigned();
            $table->integer('sujet_id')->unsigned();

            $table->foreign("auteur_id")->references("auteur_id")->on("Auteurs");
            $table->foreign("sujet_id")->references("sujet_id")->on("Sujets");

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
        Schema::dropIfExists('cours');
    }
}
