<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->bigInteger('idpuesto')->unsigned();//El unsigned es para que solo haya numeros positivos
            //$table->bigInteger('iddepartamento')->unsigned();
            $table->date('fechacontrato')->useCurrent();

            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100)->unique();
            $table->string('telefono', 9)->unique();
    
            $table->foreign('idpuesto')->references('id')->on('puesto')->onDelete('cascade');
            //$table->foreign('iddepartamento')->references('id')->on('departamento');
            
            
            

            //$table->unique('iddepartamento');
            //$table->unique('idpuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
