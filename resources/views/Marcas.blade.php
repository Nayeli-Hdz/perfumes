@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Formulario de Alta para de Marcas</h3>
    </div>
<div class="panel-body">

<form action="{{route('GuardarMarcas')}}" method="POST" enctype='multipart/form-data'>
    {{csrf_field()}}

        <div class="col-md-2 form-group">
            <label for="id_marca">Clave: </label>
            @if($errors->first('id_marca'))
            <p class='text-danger'>{{$errors->first('id_marca')}}</p>
            @endif
                <input type="text" name="id_marca" id="id_marca"  value="{{$idsigue}}" readonly='readonly'  class="form-control" placeholder="">
        </div>

        <div class="col-md-3 form-group">
                <label for="tel">Nombre:</label>
                @if($errors->first('nombre'))
            <p class='text-danger'>{{$errors->first('nombre')}}</p>
            @endif
                    <input type="text" name="nombre"id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
        </div>

        <div class="col-md-5 form-group">
                <label for="tel">Logo de la Marca:</label>
                @if($errors->first('img'))
                    <p class='text-danger'>{{$errors->first('img')}}</p>
                @endif
                    <input type="file" name="img" id="img" class="form-control">
        </div>

        <div class="col-md-3 form-group" >
                <label>Activo: </label>
                    <fieldset>
                        <div class="form-check">
                            <input type="radio" name="activo" id="activo" value="si" >
                            <label for="si">Si</label>
                                  
                            <input  type="radio" name="activo" id="activo" value="no" checked>
                            <label  for="no">No</label>
                        </div>
                    </fieldset>
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