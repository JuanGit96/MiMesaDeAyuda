<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typeCase'); # (Incidencia/Requerimiento).
            $table->string('priority'); #Alta, media, baja
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('description');
            $table->integer('status')->default(0); #0Pendiente 1EnCurso 2Resuelto

            $table->unsignedBigInteger('technical_id')->nullable(); #Tecnico asociado
            $table->unsignedBigInteger('client_id'); #cliente asociado

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
        Schema::dropIfExists('tickets');
    }
}
