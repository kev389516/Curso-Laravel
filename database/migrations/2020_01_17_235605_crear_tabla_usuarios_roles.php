<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuariosRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id','fk_usuariosroles_roles')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_usuariosroles_usuarios')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('estado');
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
        Schema::dropIfExists('usuarios_roles');
    }
}
