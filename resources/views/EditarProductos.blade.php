@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Formulario para editar Productos</h3>
    </div>
<div class="panel-body">
    <form action="{{route('EditarProductos',$consulta->id_productos)}}" method="POST" enctype='multipart/form-data'>
    {{csrf_field()}}
        
        <div class="col-md-4">
            <label for="id_producto">Clave: </label>
            @if($errors->first('id_productos'))
            <p class='text-danger'>{{$errors->first('id_productos')}}</p>
            @endif
                <input type="text" name="id_productos" id="id_productos" value="{{$consulta->id_productos}}" class="form-control" placeholder="">
        </div>

        <div class="col-md-5 form-group">
                <label for="tel">Logo de la Marca:</label>
                <img src="{{asset('archivos/' .$consulta->img)}}" height="100" width="100">
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
                <input type="text" name="nombre" id="nombre" value="{{$consulta->nombre}}" class="form-control" placeholder="Nombre del perfume">
        </div>

        <div class="col-md-4"> 
            <label>Nombre de la marca: </label>
            <select class="form-control" name="id_marca">
                <option value  ='{{$id_marca}}'>{{$nommar}}</option>
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
                    <input type="text" name="contenido"id="contenido" value="{{$consulta->contenido}}"  class="form-control" placeholder="Ejemplo: 100 ml">
        </div>

        <div class="col-md-4">
            <label>Precio del producto $: </label>
            @if($errors->first('precio'))
            <p class='text-danger'>{{$errors->first('precio')}}</p>
            @endif
                <input type="text" name="precio" id="precio" value="{{$consulta->precio}}"  class="form-control" placeholder="Precio $$">
        </div>

        
        <div class="col-md-4"> 
            <label>Nombre de la Categoría: </label>
            <select class="form-control" name="id_categoria">
                <option value  ='{{$id_categoria}}'>{{$nomcat}}</option>
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
                    <input type="text" name="codigo" id="codigo" value="{{$consulta->codigo}}"  class="form-control" placeholder="Código del producto">
        </div>

        <div class="col-md-3">
                <label for="tel">Existencia (piezas):</label>
                @if($errors->first('existencia'))
            <p class='text-danger'>{{$errors->first('existencia')}}</p>
            @endif
                    <input type="text" name="existencia" id="existencia" value="{{$consulta->existencia}}"  class="form-control" placeholder="Existencia del producto">
        </div>

        <div class="col-md-4"> 
            <label>Nombre de la marca: </label>
            <select class="form-control" name="id_proveedores">
                <option value  ='{{$id_proveedores}}'>{{$nomprov}}</option>
            @foreach($proveedores as $proveedor)
                <option value  ='{{$proveedor->id_proveedores}}'>{{$proveedor->nombre}}</option>
            @endforeach 
            </select>   
        </div>

        <div class="col-md-4"> 
            <label>Tipo: </label>
            <select class="form-control" name="id_tipo">
                <option value  ='{{$id_tipo}}'>{{$nomtip}}</option>
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
            <input type="textarea" name="descripcion" id="descripcion" value="{{$consulta->descripcion}}" class="form-control" placeholder="Descripción">

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