<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaUsuario extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create("usuario", function($tabla) {
            $tabla->increments('id');
            $tabla->string("nombres", 150);
            $tabla->string("apellidos", 150);
            $tabla->string("direccion", 150);
            $tabla->date("fecha_nacimiento");
            $tabla->string("correo", 50);
            $tabla->string("password", 50);
            $tabla->string('token', 50);
            $tabla->boolean("verificado");
            $tabla->dateTime("ultimo_acceso");
            $tabla->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop("usuario");
    }

}
