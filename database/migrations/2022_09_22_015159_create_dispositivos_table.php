<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos', function (Blueprint $table) {
        $table->string('serie')->unique();
        $table->string('tipo');
        $table->string('marca');
        $table->string('modelo');
        $table->boolean('estado');
        $table->string('color')->nullable();
        $table->string('sim')->nullable();
        $table->string('abonado')->nullable();
        $table->string('cargo_fijo')->nullable();
        $table->primary('serie');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositivos');
    }
}
