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
            $table->string('nombre_revista',250)->default('none');
            $table->integer('edicion')->default('none');
            $table->string('autores', 250)->default('none');
            $table->string('issn', 20)->default('none');
            $table->string('portada',250);
            $table->string('file',250);
            $table->integer('seccion_id')->default(3);
            // $table->string('ensayo',250)->default('none');
            $table->integer('activo');
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
