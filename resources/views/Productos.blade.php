@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Formulario de alta para Productos</h3>
    </div>
<div class="panel-body">

    <form action="{{route('GuardarProductos')}}" method="POST" enctype='multipart/form-data'>
    {{csrf_field()}}
        
        <div class="col-md-4">
            <label for="id_productos">Clave: </label>
            @if($errors->first('id_productos'))
            <p class='text-danger'>{{$errors->first('id_productos')}}</p>
            @endif
                <input type="text" name="id_productos" id="id_productos" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="">
        </div>

        <div class="col-md-5 form-group">
                <label for="tel">Logo de la Marca:</label>
                @if($errors->first('img'))
                    <p class='text-danger'>{{$errors->first('img')}}</p>
                @endif
                    <input type="file" name="img" id="img" class="form-control">
        </div>

        <div class="col-md-4">
            <label>Nombre del perfume: </label>
            @if($errors->first('nombre'))
            <p class='text-danger'>{{$errors->first('nombre')}}</p>
            @endif
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre del perfume">
        </div>

        <div class="col-md-4"> 
            <label>Nombre de la marca: </label>
            <select class="form-control" name="id_marca">
            @foreach($marcas as $marca)
                <option value  ='{{$marca->id_marca}}'>{{$marca->nombre}}</option>
            @endforeach 
            </select>   
        </div>

        <div class="col-md-4">
                <label for="tel">Contenido (ml):</label>
                @if($errors->first('contenido'))
            <p class='text-danger'>{{$errors->first('contenido')}}</p>
            @endif
                    <input type="text" name="contenido"id="contenido" value="{{old('contenido')}}" class="form-control" placeholder="Ejemplo: 100 ml">
        </div>

        <div class="col-md-4">
            <label>Precio del producto $: </label>
            @if($errors->first('precio'))
            <p class='text-danger'>{{$errors->first('precio')}}</p>
            @endif
                <input type="text" name="precio" id="precio" value="{{old('precio')}}" class="form-control" placeholder="Precio $$">
        </div>

        <div class="col-md-4"> 
            <label>Categoría: </label>
            <select class="form-control" name="id_categoria">
            @foreach($categorias as $categoria)
                <option value  ='{{$categoria->id_categoria}}'>{{$categoria->nombre}}</option>
            @endforeach 
            </select>   
        </div>
        
        <div class="col-md-4">
                <label for="tel">Código:</label>
                @if($errors->first('codigo'))
            <p class='text-danger'>{{$errors->first('codigo')}}</p>
            @endif
                    <input type="text" name="codigo" id="codigo" value="{{old('codigo')}}" class="form-control" placeholder="Código del producto">
        </div>

        <div class="col-md-3">
                <label for="tel">Existencia (piezas):</label>
                @if($errors->first('existencia'))
            <p class='text-danger'>{{$errors->first('existencia')}}</p>
            @endif
                    <input type="text" name="existencia" id="existencia" value="{{old('existencia')}}" class="form-control" placeholder="Existencia del producto">
        </div>

        <div class="col-md-4"> 
            <label>Nombre del proveedor: </label>
            <select class="form-control" name="id_proveedores">
            @foreach($proveedores as $proveedor)
                <option value  ='{{$proveedor->id_proveedores}}'>{{$proveedor->nombre}}</option>
            @endforeach 
            </select>   
        </div>

        <div class="col-md-4"> 
            <label>Tipo: </label>
            <select class="form-control" name="id_tipo">
            @foreach($tipos as $tipo)
                <option value  ='{{$tipo->id_tipo}}'>{{$tipo->nombre}}</option>
            @endforeach 
            </select>   
        </div>

        <div class="col-md-8">
            <label>Descripción</label>
            @if($errors->first('descripcion'))
            <p class='text-danger'>{{$errors->first('descripcion')}}</p>
            @endif
                <input type="textarea" name="descripcion" id="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción">

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
    
                     
        <div class=" col-md-6 form-group">
                <div class="col-md-3">
                    <button class="btn btn-success btn-block">Guardar</button>
                </div>
                <div class="col-md-3">
                    <button  class="btn btn-danger btn-block">Cancelar</button>
                </div>
                            
        </div>
    </form>
@stop