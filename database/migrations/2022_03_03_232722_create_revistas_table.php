<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->integer('anio');
            $table->integer('edicion');
            $table->string('portada',250);
            $table->string('file',250);
            $table->integer('seccion_id')->default(3);
            $table->string('ensayo',250)->default('none');
            $table->integer('activo');
            $table->string('nombre_ensayo',250)->default('none');
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
        Schema::dropIfExists('revistas');
    }
}
