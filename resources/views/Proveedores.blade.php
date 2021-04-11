@extends('Principal')
@section('contenido')


<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Formulario de alta para de Proveedores</h3>
    </div>
<div class="panel-body">   
<h1>Alta de Proveedores</h1>
<br><br><br>
<form action="{{route('GuardarProveedores')}}" method="POST">
    {{csrf_field()}}

        <div class="col-md-3">
            <label for="id_producto">Clave: </label>
            @if($errors->first('id_proveedores'))
            <p class='text-danger'>{{$errors->first('id_proveedores')}}</p>
            @endif
                <input type="text" name="id_proveedores" id="id_proveedores" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="">
        </div>

        <div class="col-md-4">
            <label>Nombre del proveedor: </label>
            @if($errors->first('nombre'))
            <p class='text-danger'>{{$errors->first('nombre')}}</p>
            @endif
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre del perfume">
        </div>

        <div class="col-md-4">
                <label for="tel">Correo:</label>
                @if($errors->first('email'))
            <p class='text-danger'>{{$errors->first('email')}}</p>
            @endif
                    <input type="text" name="email"id="email" value="{{old('email')}}" class="form-control" placeholder="Correo electrónico">
        </div>

        <div class="col-md-4">
            <label>Telefono celular: </label>
            @if($errors->first('telefono'))
            <p class='text-danger'>{{$errors->first('telefono')}}</p>
            @endif
                <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono celular">
        </div>

        <div class="col-md-4">
                <label for="tel">Código (10 digitos):</label>
                @if($errors->first('codigo'))
            <p class='text-danger'>{{$errors->first('codigo')}}</p>
            @endif
                    <input type="text" name="codigo" id="codigo" value="{{old('codigo')}}" class="form-control" placeholder="Código del producto">
        </div>

        <div class="col-md-4"> 
            <label>Nombre de la marca: </label>
            <select class="form-control" name="id_marca">
            @foreach($marcas as $marca)
                <option value  ='{{$marca->id_marca}}'>{{$marca->nombre}}</option>
            @endforeach 
            </select>   
        </div>

        <div class="col-md-3 form-group" >
                <label>Activo: </label>
                    <fieldset>
                        <div class="form-check">
                            <input type="radio" name="activo" id="activo" value="si">
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