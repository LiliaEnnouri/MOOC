<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTextesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('cours_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cours_id')->references('id')->on('cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('textes');
    }
}
