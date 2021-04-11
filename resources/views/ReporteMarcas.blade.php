@extends('Principal')
@section('contenido')

<div class="panel panel-warning">
    <div class="panel-heading"> 
        <h3 class="panel-title">Reporte Marcas</h3>
    </div>
<div class="panel-body">

@if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif


	<a href="Marcas" style='width:150px; height:35px'  class="btn btn-primary">Agregar Registro</a>
	<br><br>
<center>
	<table class="table table-bordered">
    <thead>
	<tr>
		<th scope="col">Clave</th>
		<th scope="col">Logo</th>
		<th scope="col">Nombre</th>
        <th scope="col">Activo</th>
		<th scope="col">Operaciones</th>
    </tr>
	@foreach($consulta as $c)
	<tr>
		<th scope="row">{{$c->id_marca}}</th>
		<td><img src="{{asset('archivos/' .$c->img)}}" height="40" width="40"></td>
		<td>{{$c->nombre}}</td>
		<td>{{$c->activo}}</td>
		<td>
		@if($c->activo=="si")


		<a href="ModificarMarca/{{$c->id_marca}}/edit" class="btn btn-info">Modificar</a>
	
		<a href="DesactivarMarca/{{$c->id_marca}}" class="btn btn-secondary">Desactivar</a>

	    @else

	    <a href="RestaurarMarca/{{$c->id_marca}}" class="btn btn-success">Restaurar</a>
		<a href="EliminarMarca/{{$c->id_marca}}" class="btn btn-danger">Eliminar</a>
	
	@endif
	    </td>
    </tr>

	@endforeach

	</table>
</center>
@stop