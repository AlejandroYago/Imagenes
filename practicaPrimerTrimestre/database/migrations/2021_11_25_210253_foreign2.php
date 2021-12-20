<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreign2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamento', function (Blueprint $table) {
            
            $table->unsignedBigInteger('idempleadojefe')->nullable()->unique();//El unique es para que una persona no pueda ser jefe de dos departamentos
            $table->foreign('idempleadojefe')->references('id')->on('empleado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamento', function (Blueprint $table) {
            //
        });
    }
}
