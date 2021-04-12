@extends('Principal')
@section('contenido')

<h1>Modifica de empleado</h1>
    <form action = "{{route('guardacambios')}}" method = "POST" enctype="multipart/form-data">
        
        {{csrf_field()}}

        <div class="col-md-4 form-group">
            <label for="dni">Clave:
            @if ($errors->first('id_usuario'))
            <p class='text-danger'>{{$errors->first('id_usuario')}}</p>
            @endif
            <!--En esta parte es ara incrementar en automatico la id-->
         </label>
            <input type="text" name="id_usuario" id="id_usuario" value="{{$consulta->id_usuario}}" readonly='readonly' 
                class="form-control" tabindex="5">
                <!--value="{{$consulta->id_usuario}}" esto es para mandar a llamar la id que se va a modificar-->
            </div>
                 <div class="col-sm-4">
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="{{asset('archivos/' .$consulta->img)}}" height="80" width="80">
                            <input class="form-control" type="file" name="img" id="img" value="{{$consulta->img}}">
                        </div>
                    </div>



        <div class="col-md-4  form-group">
            <label for="dni">Apellido Paterno:
            @if ($errors->first('ap_paterno'))
            <p class='text-danger'>{{$errors->first('ap_paterno')}}</p>
            @endif
            </label>
                <input type="text" name="ap_paterno" id="ap_paterno" value="{{$consulta->ap_paterno}}" class="form-control" placeholder="Apellido Paterno">
    <!--value="{{$consulta->ap_paterno}}" esto es para mandar a llamar el campo que se va a modificar-->
        </div>


         <div class="col-md-4  form-group">
            <label for="dni">Apellido Materno:
            @if ($errors->first('ap_materno'))
            <p class='text-danger'>{{$errors->first('ap_materno')}}</p>
            @endif
             </label>
                <input type="text" name="ap_materno" id="ap_materno" value="{{$consulta->ap_materno}}" class="form-control" placeholder="Apellido Materno">
        </div>


         <div class="col-md-4  form-group">
            <label for="dni">Nombre(s):
            @if ($errors->first('nombre'))
            <p class='text-danger'>{{$errors->first('nombre')}}</p>
            @endif
             </label>
                <input type="text" name="nombre" id="nombre" value="{{$consulta->nombre}}" class="form-control" placeholder="Nombre(s)">
        </div>


        <div class="col-md-4  form-group">
            <label for="dni">Correo Electronico:
            @if ($errors->first('email'))
            <p class='text-danger'>{{$errors->first('email')}}</p>
            @endif
             </label>
                <input type="email" name="email" id="email" value="{{$consulta->email}}" class="form-control" placeholder="example@gmail.com">
        </div>


        <div class="col-xs-6 col-sm-6 col-md-4">
                <label for="dni">Sexo:</label>
            <!--Esto nos permite que si ingresamos a un registro, en el radio nos aparezca seleccionado el sexo que se le selecciono y nos permita modificarlo-->
                @if($consulta->sexo=='F')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
            <input type="radio" id="sexo2" name="sexo" value="F" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @else
                <div class="custom-control custom-radio">
            <input type="radio" id="sexo1" name="sexo" value="M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @endif


            </div>

        <div class="col-md-4">
            <label for="dni">Estado: 
                <select class="form-control" name="idestado">
                    <option value="{{$consulta->idestado}}">{{$consulta->esta}}</option>
                   <!--Es para mandar a llamar lo que tengo en la tabla municipios en la bd
                    y esto es mandado a llamar desde el controlador, esta es el alias de municipios-->
                    @foreach($estados as $esta) 
                        <!--Aqui es para que llame la inf que tengo en esta que llama lo que esta en la llave primaria de municipios-->
                        <option value="{{$esta->idestado}}">{{$esta->nombre}}</option>
                        @endforeach
                    </select>
            </div>



          <div class="col-md-4">
            <label for="dni">Municipio: 
                <select class="form-control" name="idmunicipio">
                    <option value="{{$consulta->idmunicipio}}">{{$consulta->muni}}</option>
                   <!--Es para mandar a llamar lo que tengo en la tabla municipios en la bd
                    y esto es mandado a llamar desde el controlador, muni es el alias de municipios-->
                    @foreach($municipios as $muni) 
                        <!--Aqui es para que llame la inf que tengo en muni que llama lo que esta en la llave primaria de municipios-->
                        <option value="{{$muni->idmunicipio}}">{{$muni->nombre}}</option>
                        @endforeach
                    </select>
            </div>

        <div class="col-md-4 ">
            <label for="dni">Localidad:
                @if ($errors->first('localidad'))
                <p class='text-danger'>{{$errors->first('localidad')}}</p>
                @endif
             </label>
                <input type="text" name="localidad" id="localidad" value="{{$consulta->localidad}}"  class="form-control" placeholder="Localidad">
        </div>
        

        <div class="col-md-4 form-group">
                <label for="tel">Calle:
                    @if ($errors->first('calle'))
                    <p class='text-danger'>{{$errors->first('calle')}}</p>
                    @endif
                </label>
                    <input type="text" name="calle" id="calle" value="{{$consulta->calle}}" class="form-control" placeholder="Calle">
        </div>

       

        
        <div class="col-md-4 form-group">
                <label for="tel">Código Postal:
                        @if ($errors->first('cp'))
                        <p class='text-danger'>{{$errors->first('cp')}}</p>
                        @endif
                </label>
                    <input type="text" name="cp" id="cp" value="{{$consulta->cp}}" class="form-control" placeholder="Código Postal">
        </div>

        <div class="col-md-4  form-group">
            <label>Contraseña:
                @if ($errors->first('contraseña'))
                <p class='text-danger'>{{$errors->first('contraseña')}}</p>
                @endif
             </label> <!--En los values manda a llamar la informacion que ya ha sido registrada -->
                <input type="password" name="contraseña" id="contraseña" value="{{$consulta->contraseña}}" class="form-control" placeholder="Contraseña">
        </div>


                     
            <div class=" col-md-6 form-group">
                <div class="col-md-3">
                    <button  class="btn btn-success btn-block">Guardar</button>
                </div>
                <div class="col-md-3">
                    <button type="reset" class="btn btn-danger btn-block">Cancelar</button>
                </div>
            <a href="{{route('reporteusuarios')}}">
                <button type="button" class="btn btn-secondary">Reporte Usuarios</button>
            </a>
         
            </div>
    </form>
@stop 