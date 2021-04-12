@extends('vista')

@section('contenido')


            <div class="panel panel-warning">
                      <div class="panel-heading"> 
                        <h3 class="panel-title">Formulario de Alta para Administrador</h3>
                      </div>
                      <div class="panel-body">


                        <form role="form" action = "{{route('guardaradmin')}}" method = "POST" enctype='multipart/form-data'>
                        {{csrf_field()}}

                        <div class="col-md-4 form-group">
                            <label for="dni">Clave de Administrador:
                              @if($errors->first('ClaveAdministrador'))
                              <p class='text-danger'> {{$errors->first('ClaveAdministrador')}}</p>
                              @endif
                            </label>
                            <input type="text" name="ClaveAdministrador" id="idAdmin" value="{{$idsigue}}" readonly='readonly' class="form-control" placeholder="Clave administrador" tabindex="5">
                         </div>

                         <div class="col-md-4 form-group">
                          <label  class="texto">Fotografia: 
                              @if($errors->first('Fotografia'))
                              <p class='text-danger'> {{$errors->first('Fotografia')}}</p>
                              @endif
                            </label>
                                <input type="file" name="Fotografia" id="Fotografia" value="{{old('Fotografia')}}" class="form-control" tabindex="6">
                          </div>

                         <div class="col-md-4  form-group">
                            <label>Nombre de usuario:
                            @if($errors->first('NombreUsuario'))
                              <p class='text-danger'> {{$errors->first('NombreUsuario')}}</p>
                              @endif</label>
                            <input type="text" name="NombreUsuario" id="NombreUs" value="{{old('NombreUsuario')}}" class="form-control" placeholder="Ejemplo: JuanRQ1516">
                          </div>

                          <div class="col-md-4  form-group">
                            <label>Nombre(s):
                            @if($errors->first('Nombre'))
                              <p class='text-danger'> {{$errors->first('Nombre')}}</p>
                              @endif</label>
                            <input type="text" name="Nombre" id="Nombre" value="{{old('Nombre')}}" class="form-control" placeholder="Ejemplo: Juan">
                          </div>

                          <div class="col-md-4  ">
                            <label>Apellido Paterno:
                            @if($errors->first('ApellidoPaterno'))
                              <p class='text-danger'> {{$errors->first('ApellidoPaterno')}}</p>
                              @endif</label>
                            <input type="text" name="ApellidoPaterno" id="App" value="{{old('ApellidoPaterno')}}" class="form-control" placeholder="Ejemplo: Rosales">
                          </div>

                          <div class="col-md-4">
                            <label>Apellido Materno:
                            @if($errors->first('ApellidoMaterno'))
                              <p class='text-danger'> {{$errors->first('ApellidoMaterno')}}</p>
                              @endif</label>
                            <input type="text" name="ApellidoMaterno" id="Apm" value="{{old('ApellidoMaterno')}}" class="form-control" placeholder="Ejemplo: Quiroz">
                          </div>

                          <div class="col-md-12">

                          <div class="row">
                            <div class="col-md-3">
                                <label for="dni">Sexo:</label>
                                <div class="custom-control custom-radio">
                                <input type="radio" id="sexo1" name="Sexo"  value = "M" class="custom-control-input" checked="">
                                <label class="custom-control-label" for="sexo1">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" id="sexo2" name="Sexo" value = "F" class="custom-control-input">
                                <label class="custom-control-label" for="sexo2">Femenino</label>
                                </div>
                            </div>

                         
                            
                            <div class="col-md-3 form-group">
                              <label for="tel">Telefono:
                                @if($errors->first('Telefono'))
                              <p class='text-danger'> {{$errors->first('Telefono')}}</p>
                              @endif</label>
                              <input type="text" name="Telefono" id="Telefono" value="{{old('Telefono')}}" class="form-control" placeholder="Ejemplo: 7255885555">
                            </div>

                            <div class="col-md-3 form-group">
                              <label>Correo Electronico:
                              @if($errors->first('Correo'))
                              <p class='text-danger'> {{$errors->first('Correo')}}</p>
                              @endif</label>
                              <input  type="email" name="Correo" id="Correo" value="{{old('Correo')}}" class="form-control" placeholder="Ejemplo:Juan@gmail.com">
                            </div>

                            <div class="col-md-3 form-group">
                              <label>Contraseña:
                              @if($errors->first('Contraseña'))
                              <p class='text-danger'> {{$errors->first('Contraseña')}}</p>
                              @endif</label>
                              <input  type="password" name="Contraseña" id="Contraseña"  class="form-control" placeholder="Contraseña">
                            </div>

                          <div class=" col-md-6 form-group">
                          
                          <div class="row">
                            <div class="col-md-3"><input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="7"
                                title="Guardar datos ingresados">
                            </div>

                              <div class="col-md-3">
                                <button  class="btn btn-danger btn-block btn-lg">Cancelar</button>
                              </div>
                            
                          </div>

                          </div>

                        </form>
@stop

