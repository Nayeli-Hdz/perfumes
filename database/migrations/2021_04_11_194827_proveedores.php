<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores',function(Blueprint $table){
            $table->increments('id_proveedores');
            $table->string('nombre',30);
            $table->string('email',30);
            $table->string('telefono');
            $table->string('codigo',10);
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca') -> references ('id_marca')-> on ('marcas');
            $table->enum('activo',['si','no']);
            $table->remembertoken();
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
        Schema::drop('proveedores');
    }
}
