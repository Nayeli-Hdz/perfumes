@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Reportes Productos</h3>
    </div>
<div class="panel-body">

@if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif

<a href="Productos" style='width:150px; height:35px'  class="btn btn-primary">Agregar Registro</a>

	<br><br>
<center>
	<table class="table table-bordered">
    <thead>
	<tr>
		<th scope="col">Clave</th>
		<th scope="col">Imagen</th>
		<th scope="col">Nombre</th>
		<th scope="col">Marca</th>
		<th scope="col">Precio</th>
        <th scope="col">Código</th>
        <th scope="col">Existencia</th>
        <th scope="col">Activo</th>
		<th scope="col">Operaciones</th>
    </tr>
	@foreach($consulta as $c)
	<tr>
		<th scope="row">{{$c->id_productos}}</th>
		<td><img src="{{asset('archivos/' .$c->img)}}" height="40" width="40"></td>
		<td>{{$c->nombre}}</td>
		<td>{{$c->marcas}}</td>
		<td>{{$c->precio}}</td>
        <td>{{$c->codigo}}</td>
        <td>{{$c->existencia}}</td>
		<td>{{$c->activo}}</td>
		<td>
		@if($c->activo=="si")


		<a href="ModificarProductos/{{$c->id_productos}}/edit" class="btn btn-info">Modificar</a>
	<br>
		<a href="DesactivarProductos/{{$c->id_productos}}" class="btn btn-secondary">Desactivar</a>

	    @else

	    <a href="RestaurarProductos/{{$c->id_productos}}" class="btn btn-success">Restaurar</a>
		<a href="EliminarProductos/{{$c->id_productos}}" class="btn btn-danger">Eliminar</a>
	
	@endif
	    </td>
    </tr>

	@endforeach

	</table>
</center>
@stop