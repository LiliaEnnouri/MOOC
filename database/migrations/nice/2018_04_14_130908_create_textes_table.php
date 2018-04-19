    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Textes', function (Blueprint $table) {
            $table->increments('texte_id');
            $table->string('nom');
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
        Schema::dropIfExists('textes');
    }
}
