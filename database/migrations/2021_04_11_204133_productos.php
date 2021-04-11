<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table){
            $table->increments('id_productos');
            $table->string('nombre',30);
            
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca') -> references ('id_marca')-> on ('marcas');

            $table->string('contenido',30);
            $table->string('img',255);
            $table->float('precio');

            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria') -> references ('id_categoria')-> on ('categorias');

            $table->string('codigo',30);
            $table->integer('existencia');

            $table->integer('id_proveedores')->unsigned();
            $table->foreign('id_proveedores') -> references ('id_proveedores')-> on ('proveedores');

            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo') -> references ('id_tipo')-> on ('tipos');

            $table->string('descripcion',255);
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
        Schema::drop('productos');
    }
}
