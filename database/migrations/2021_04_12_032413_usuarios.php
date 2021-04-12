<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->increments('id_usuario');
             $table->string('img');
            $table->string('ap_paterno', 40);
            $table->string('ap_materno', 40);
            $table->string('nombre', 40);
            $table->string('email', 40);
            $table->string('sexo', 1);
    
            $table->integer('idestado')->unsigned();  //aqui es en donde va la llave foranea
            $table->foreign('idestado')->references('idestado')->on('estados'); //aqui la llave foranea busca la tabla de donde viene
    
            $table->integer('idmunicipio')->unsigned();
            $table->foreign('idmunicipio')->references('idmunicipio')->on('municipios');
    
            $table->string('localidad', 50);
            $table->string('calle', 50);
            $table->string('cp', 5);
            $table->string('contraseña', 50);
    
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('usuarios');
    }
}
