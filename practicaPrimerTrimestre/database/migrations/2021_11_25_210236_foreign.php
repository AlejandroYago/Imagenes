<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {//AQUI CREAMOS UNAS NUEVAS COLUMNAS UNA VEZ QUE YA ESTAN CREADAS LAS TABLAS, PARA ASIGNAR LA CLAVE FORANEA DE IDJEFEDEPARTAMENTO
           //EL Schema::table sirve para añadir tablas 
             $table->bigInteger('iddepartamento')->unsigned();

             $table->foreign('iddepartamento')->references('id')->on('departamento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            //
        });
    }
}
