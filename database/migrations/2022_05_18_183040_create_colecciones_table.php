<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colecciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',150);
            $table->string('coordinadores',250);
            $table->string('descripcion',500);
            $table->string('portada',250);
            $table->string('file',250);
            $table->integer('activo');
            $table->integer('seccion_id')->default(1);
            $table->integer('anio');
            $table->integer('paginas');
            $table->string('tema',150);
            $table->string('coleccion',150);
            $table->string('isbn',20);
            $table->string('novedad',150);
            $table->string('categoria',20);
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
        Schema::dropIfExists('colecciones');
    }
}
