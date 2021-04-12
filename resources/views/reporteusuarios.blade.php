@extends('Principal')

@section('contenido')
<div class="container">
  <h1>REPORTE DE USUARIOS</h1>
  <br><!--Esto es para darle función al boton loque se encuentra entre {} es para mandar a llamar
  la ruta a donde se va a dirigir, en este caso sera a la vista altaempleado-->
  <a href="{{route('Usuarios')}}">
  @if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif
  <button type="button" class="btn btn-success">Alta de Usuarios</button>
  </a>
  <br>
  <br>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Clave</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Correo</th>
      <th scope="col">Municipio</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody> <!--Esto es para llamar la inf que esta en la variable consulta del controlador
  el endforeach hace que cada registro que este en la consulta cree un registro se le da un aleas-->
    @foreach($consulta as $c)
    <tr>
      <th scope="row">{{$c->id_usuario}}</th>
      <td><img src="{{asset('archivos/' .$c->img)}}" height="40" width="40"></td>
      <td>{{$c->nombre}} {{$c->ap_paterno}} {{$c->ap_materno}}</td>
      <td>{{$c->email}}</td>
      <td>{{$c->muni}}</td>  <!--Aqui van los botones de operaciones-->
      <td>
      	<!--De est amanera voy a mandar a llamar la ruta modifica usuario y manda a llamar la id del
      usuario para poder comenzar la modificacion -->
      	<a href="{{route('modificausuario',['id_usuario'=>$c->id_usuario])}}">
      	<button type="button" class="btn btn-info">Modificar</button>
      </a>
        <!--De est amanera voy a mandar a llamar la ruta desactiva usuario y manda a llamar la id del
      usuario y lo desactivara -->
      @if($c->deleted_at) <!--Este es para cuando un campo este desactivado se pueda volver a activar
      o borrar de la bd-->
        <a href="{{route('activarusuario',['id_usuario'=>$c->id_usuario])}}">
        <button type="button" class="btn btn-warning">Activar</button>
        </a>
        <a href="{{route('borrausuario',['id_usuario'=>$c->id_usuario])}}">
        <button type="button" class="btn btn-secondary">Borrar</button>
        </a>

      @else

        <a href="{{route('desactivausuario',['id_usuario'=>$c->id_usuario])}}">
        <button type="button" class="btn btn-danger">Desactivar</button>
        </a>
    </td>

      @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@stop