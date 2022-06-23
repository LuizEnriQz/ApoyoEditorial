<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->integer('anio');
            $table->string('portada',50);
            $table->string('file',250);
            $table->integer('activo');
            $table->integer('seccion_id')->default(2);
            $table->string('autores', 250);
            $table->string('descripcion', 500);
            $table->string('categoria', 100);
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
        Schema::dropIfExists('libros');
    }
}
