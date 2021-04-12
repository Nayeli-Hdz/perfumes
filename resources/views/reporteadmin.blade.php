@extends('vista')

@section('contenido')

                    
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Reporte de Administradores</h3>
                      </div>
                      <br>
                      <a href="{{route('altaadmin')}}"> <button type="button" class="btn btn-success">Alta Administrador</button></a>
                        <br>
                        <br>
                      @if(Session::has('mensaje'))  <!-- si existe una se que se llame mensaje que imprima el mensaje  -->
                        <div class='alert alert-success'>{{Session::get('mensaje')}}</div> <!--manda el valor de la sesion llamada mensaje -->
                      @endif
                      
                      <div class="panel-body">

                        <div class="bs-example">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                   
                                            <thead>
                                            <tr>
                                                <th >Clave</th>
                                                <th>Foto/Imagen</th>
                                                <th >Nombre de Usuario</th>
                                                <th >Nombre Completo</th>
                                                <th >Sexo</th>
                                                <th >Telefono</th>
                                                <th >Correo</th>
                                                <th >Operaciones</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($consulta as $c)
                                            <tr>
                                                <th >{{$c->ClaveAdministrador}}</th>
                                                <td><img src="{{asset('archivos/'. $c->Fotografia )}}" height=50 width=50></td>    
                                                <td>{{$c->NombreUsuario}}</td>
                                                <td>{{$c->Nombre}} {{$c->ApellidoPaterno}} {{$c->ApellidoMaterno}}</td>
                                                <td>{{$c->Sexo}}</td>
                                                <td>{{$c->Telefono}}</td>
                                                <td>{{$c->Correo}}</td>
                                                <td>
                                                    <a href="{{route('modificaradmin',['ClaveAdministrador'=>$c->ClaveAdministrador])}}">
                                                    <button type="button" class="btn btn-info">Modificación</button></a>
                                                    @if($c->deleted_at)             <!--si la consulta c el campo deleted tiene info manda a llamar un campo activar -->
                                                    <!-- viaja el id de la variable de $c en el campo clave admin-->
                                                    <a href="{{route('activaradmin',['ClaveAdministrador'=>$c->ClaveAdministrador])}}">    <!-- -->
                                                        <button type="button" class="btn btn-warning">Activar</button></a>
                                                    <a href="{{route('borraradmin',['ClaveAdministrador'=>$c->ClaveAdministrador])}}"> 
                                                        <button type="button" class="btn btn-secondary">Borrar</button></a>
                                                    @else                               <!-- en dado caso que este vacio que llame a dasactivar -->
                                                    <a href="{{route('desactivaradmin',['ClaveAdministrador'=>$c->ClaveAdministrador])}}"> 
                                                        <button type="button" class="btn btn-danger">Desactivar</button></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>           
                      </div>
@stop
























































































































