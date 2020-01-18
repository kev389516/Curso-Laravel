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
            $table->foreign('usuario_id', 'fk_librosprestamos_usuarios')
                    ->references('id')
                    ->on('usuarios')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');            
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id', 'fk_librosprestamos_usuarios')
                    ->references('id')
                    ->on('libros')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->date('fecha_prestamo');
            $table->string('prestado_a', 100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')
                    ->nullable();
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
        Schema::dropIfExists('libros_prestamos');
    }
}
