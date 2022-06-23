<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVistaVsDescargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vista_vs__descargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_registro');
            $table->bigInteger('id_seccion');
            $table->string('nombre_archivo',250);
            $table->integer('visitas');
            $table->integer('descargas');
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
        Schema::dropIfExists('vista_vs__descargas');
    }
}
