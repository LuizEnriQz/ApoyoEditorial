<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->string('puesto', 150);
            $table->string('direccion', 250);
            $table->string('telefono',15);
            $table->string('file',250);
            $table->integer('activo');
            $table->string('email', 100);
            $table->string('resenia', 500);
            $table->string('categoria', 11);
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
        Schema::dropIfExists('administrativos');
    }
}
