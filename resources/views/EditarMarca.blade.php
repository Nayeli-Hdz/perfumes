@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Formulario para Editar Marcas</h3>
    </div>
<div class="panel-body">
<form action="{{route('EditarMarca',$consulta->id_marca)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

        <div class="col-md-3 form-group">
            <label for="id_producto">Clave: </label>
            @if($errors->first('id_marca'))
            <p class='text-danger'>{{$errors->first('id_marca')}}</p>
            @endif
                <input type="text" name="id_marca" id="id_marca" value="{{$consulta->id_marca}}" readonly='readonly' class="form-control" placeholder="">
        </div>

        <div class="col-md-4 form-group">
            <label for="tel">Nombre:</label>
                @if($errors->first('nombre'))
                    <p class='text-danger'>{{$errors->first('nombre')}}</p>
                @endif
                <input type="text" name="nombre"id="nombre" value="{{$consulta->nombre}}" class="form-control" placeholder="Correo electrónico">
        </div>  

        <div class="col-md-5 form-group">
                <label for="tel">Logo de la Marca:</label>
                <img src="{{asset('archivos/' .$consulta->img)}}" height="100" width="100">
                @if($errors->first('img'))
                    <p class='text-danger'>{{$errors->first('img')}}</p>
                @endif
                    <input type="file" name="img" id="img" class="form-control">
        </div>

     
        <div class="col-md-6 form-group">
                <div class="col-md-3">
                    <button class="btn btn-success btn-block">Guardar</button>
                </div>
                <div class="col-md-3">
                    <button  class="btn btn-danger btn-block">Cancelar</button>
                </div>
                            
        </div>
    </center>
    </form>
@stop