@extends('Principal')<!--Primero manda lo de la vista "vistabootstrap"-->
@section('contenido')<!--Esto manda a llamar después el código que se encuentra debajo-->
<h1>Alta de usuario</h1>
    <form action = "{{route('guardarusuario')}}" method = "POST" enctype="multipart/form-data">
<!--Esto es para mandar a llamar lo de la la ruta que guarda junto con el metodo de transparencia-->
        
        {{csrf_field()}}

         <!--Evita que terceros envien otros POST-->
        <div class="col-md-4 form-group">
            <label for="dni">Clave:
            @if ($errors->first('id_usuario')) 
            <!--Esto sirve para mandar cual es el erro, esos errores se mandan en "@eerrors"-->
            <p class='text-danger'>{{$errors->first('id_usuario')}}</p>
             <!--El código dice que cuando encuentre un error mandar una alerta de tipo bootstrap-->
            @endif
            <!--En esta parte es ara incrementar en automatico la id-->
         </label>
            <input type="text" name="id_usuario" id="id_usuario" value="{{$idusigue}}" readonly='readonly' 
                class="form-control" tabindex="5">
                <!--value="idusigue" esto es para incrementar en automatico la id del usuario-->
            </div>


         <div class="col-sm-4">
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>


        <div class="col-md-4  form-group">
            <label for="dni">Nombre(s):
                @if ($errors->first('nombre'))
                <p class='text-danger'>{{$errors->first('nombre')}}</p>
                @endif
             </label>
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s)">
        </div>

        <div class="col-md-4  form-group">
            <label for="dni">Apellido Paterno:
            @if ($errors->first('ap_paterno'))
            <p class='text-danger'>{{$errors->first('ap_paterno')}}</p>
            @endif
            </label>
                <input type="text" name="ap_paterno" id="ap_paterno" value="{{old('ap_paterno')}}" class="form-control" placeholder="Apellido Paterno">
    <!--value="{{old('ap_paterno')}}" esto es para no borrar el contenido que esta escrito correctamente-->
        </div>


         <div class="col-md-4  form-group">
            <label for="dni">Apellido Materno:
            @if ($errors->first('ap_materno'))
            <p class='text-danger'>{{$errors->first('ap_materno')}}</p>
            @endif
             </label>
                <input type="text" name="ap_materno" id="ap_materno" value="{{old('ap_materno')}}" class="form-control" placeholder="Apellido Materno">
        </div>


        <div class="col-xs-6 col-sm-6 col-md-4">
                <label for="dni">Sexo:</label>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>


            </div>
            
        <div class="col-md-4  form-group">
            <label for="dni">Correo Electronico:
            @if ($errors->first('email'))
            <p class='text-danger'>{{$errors->first('email')}}</p>
            @endif
             </label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="example@gmail.com">
        </div>


        

        <div class="col-md-3">
            <label for="dni">Estado: 
                @if ($errors->first('idestados'))
                  <p class='text-danger'>{{$errors->first('idestados')}}</p>
                @endif</label>
                <select class="form-control" name="idestado">
                    <option selected="">Selecciona el Estado</option>
                         <!--Es para mandar a llamar lo que tengo en la tabla estadoss en la bd
                    y esto es mandado a llamar desde el controlador, est es el alias de municipios-->
                        @foreach($estados as $est)
                         <!--Aqui es para que llame la inf que tengo en est que llama lo que esta en la llave primaria de estadoss-->
                        <option value="{{$est->idestado}}">{{$est->nombre}}</option>
                        @endforeach
                </select>
        </div>


          <div class="col-md-4">
            <label for="dni">Municipio: 
                @if ($errors->first('idmunicipios'))
                  <p class='text-danger'>{{$errors->first('idmunicipios')}}</p>
                @endif</label>
                <select class="form-control" name="idmunicipio">
                    <option selected="">Selecciona el Municipio</option>
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
                <input type="text" name="localidad" id="localidad" value="{{old('localidad')}}"  class="form-control" placeholder="Localidad">
        </div>


        <div class="col-md-4 form-group">
                <label for="tel">Calle:
                    @if ($errors->first('calle'))
                    <p class='text-danger'>{{$errors->first('calle')}}</p>
                    @endif
                </label>
                    <input type="text" name="calle" id="calle" value="{{old('calle')}}" class="form-control" placeholder="Calle">
        </div>

       

        
        <div class="col-md-4 form-group">
                <label for="tel">Código Postal:
                        @if ($errors->first('cp'))
                        <p class='text-danger'>{{$errors->first('cp')}}</p>
                        @endif
                </label>
                    <input type="text" name="cp" id="cp" value="{{old('cp')}}" class="form-control" placeholder="Código Postal">
        </div>

        <div class="col-md-4  form-group">
            <label>Contraseña:
                @if ($errors->first('contraseña'))
                <p class='text-danger'>{{$errors->first('contraseña')}}</p>
                @endif
             </label>
                <input type="password" name="contraseña" id="contraseña" value="{{old('contraseña')}}" class="form-control" placeholder="Contraseña">
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