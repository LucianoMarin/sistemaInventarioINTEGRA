<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
           $table->string('rut')->unique();
           $table->string('nombre');
           $table->string('segundo_nombre');
           $table->string('apellido_paterno');
           $table->string('apellido_materno');
           $table->string('correo');
           $table->unsignedBigInteger('id_dependencia');
           $table->primary('rut');
           $table->foreign('id_dependencia')->references('id')->on('dependencias');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadors');
    }
}
