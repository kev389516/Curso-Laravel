<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLibrosPrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros_prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id');
                       
            $table->unsignedBigInteger('libro_id');
            
            $table->date('fecha_prestamo');
            $table->string('prestado_a', 100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')
                    ->nullable();
            $table->timestamps();


            $table->foreign('usuario_id')
                    ->references('id')
                    ->on('usuarios')
                    ->onDelete('restrict')
                    ->onUpdate('restrict'); 
                    

            $table->foreign('libro_id')
                    ->references('id')
                    ->on('libros')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros_prestamos');
    }
}
