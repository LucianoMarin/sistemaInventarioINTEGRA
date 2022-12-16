<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut_trabajador');
            $table->string('serie_dispositivo');
            $table->foreign('rut_trabajador')->references('rut')->on('trabajadors');
            $table->foreign('serie_dispositivo')->references('serie')->on('dispositivos');
            $table->date('fecha_devolucion');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devolucions');
    }
}
