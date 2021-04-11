@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Reporte Proveedores</h3>
    </div>
<div class="panel-body">

@if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif


<a href="Proveedores" style='width:150px; height:35px'  class="btn btn-primary">Agregar Registro</a>

	<br><br>
<center>
	<table class="table table-bordered">
    <thead>
	<tr>
		<th scope="col">Clave</th>
		<th scope="col">Nombre</th>
		<th scope="col">Correo</th>
		<th scope="col">Teléfono</th>
		<th scope="col">Código</th>
		<th scope="col">Marca</th>
		<th scope="col">Operaciones</th>
    </tr>
	@foreach($consulta as $c)
	<tr>
		<th scope="row">{{$c->id_proveedores}}</th>
		<td>{{$c->nombre}}</td>
		<td>{{$c->email}}</td>
		<td>{{$c->telefono}}</td>
		<td>{{$c->codigo}}</td>
		<td>{{$c->marcas}}</td>
		<td>
		@if($c->activo=="si")


		<a href="ModificarProveedores/{{$c->id_proveedores}}/edit" class="btn btn-info">Modificar</a>
	
		<a href="DesactivarProveedores/{{$c->id_proveedores}}" class="btn btn-secondary">Desactivar</a>

	    @else

	    <a href="RestaurarProveedores/{{$c->id_proveedores}}" class="btn btn-success">Restaurar</a>
		<a href="EliminarProveedores/{{$c->id_proveedores}}" class="btn btn-danger">Eliminar</a>
	
	@endif
	    </td>
    </tr>

	@endforeach

	</table>
</center>
@stop