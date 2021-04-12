<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\municipios;
use App\Models\estados;
use App\Models\usuarios;
use Session;

class UsuariosController extends Controller
{
	public function modificausuario($id_usuario){
/*esto es para poder modificar el empleado, tiene lo mismo que la alta de usuario
*/
      $consulta = usuarios::withTrashed()
      ->join('municipios','municipios.idmunicipio','=',
        'usuarios.idmunicipio')
      ->join('estados','estados.idestado','=','usuarios.idestado')

      /*De aqui es para que nos muestre los datos que ya se ingresaron en las tablas*/

    ->select('usuarios.id_usuario','usuarios.nombre','usuarios.img','usuarios.ap_paterno','usuarios.ap_materno','usuarios.sexo'
    ,'municipios.nombre as muni','estados.nombre as esta','usuarios.email','usuarios.idmunicipio','usuarios.idestado','usuarios.localidad','usuarios.calle','usuarios.cp','usuarios.contraseña')

    

    ->where('id_usuario',$id_usuario) //este es para buscar la ide a la que se va a modificar
    ->get();
    //return $consulta;
    

    $estados = estados::orderBy('nombre')->get();
    $municipios = municipios::orderBy('nombre')->get();
    return view ('modificausuario')
    ->with('consulta',$consulta[0])
    ->with('estados',$estados)
    ->with('municipios',$municipios);
  }
  public function guardacambios(Request $request){


     /* Esto es para decir que campos son obligadorios y cuales no*/
    $this->validate($request,[
   
    'img' => 'image|mimes: jpg,jpeg,png,gif,svg',
    'ap_paterno' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'ap_materno' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',  //Expresion regular
    'nombre'     => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'email'      => 'required|email',
    'sexo'       => 'required',
    'idestado'   => 'required',
    'idmunicipio'=> 'required',
    'localidad'  => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'calle'      => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'cp'         => 'required|regex:/^[0-9]{5}+$/',
    'contraseña' => 'required',
  
  ]);
 /*aqui es en donde se hace la modificacion, se cambia lo que viene en el formulario, hace que se guarde lo que se vaya cambiando en el formulario*/
  $file=$request->file('img');
   if($file<>"")
    {
    $img =$file->getClientOriginalName();
    $img2 = $request->id_usuario.$img;
    \Storage::disk('local')->put($img2, \File::get($file));
    }
  $usuarios = usuarios::find($request->id_usuario); 
    // if ($request->hasFile('img')){
    //         $file           = $request->file("img");
    //         $nombrearchivo  = $file->getClientOriginalName();
    //         $file->move(public_path("img/usuarios/"),$nombrearchivo);
    //         $usuarios->img      = $nombrearchivo;
    //     }
    if($file<>"")
            {
    $usuarios ->img          = $img2;  
          }
    $usuarios ->ap_paterno   = $request->ap_paterno;
    $usuarios ->ap_materno   = $request->ap_materno;
    $usuarios ->nombre       = $request->nombre;
    $usuarios ->email        = $request->email;
    $usuarios ->sexo         = $request->sexo;
    $usuarios ->idestado     = $request->idestado;
    $usuarios ->idmunicipio  = $request->idmunicipio;
    $usuarios ->localidad    = $request->localidad;  
    $usuarios ->calle        = $request->calle;
    $usuarios ->cp           = $request->cp;
    $usuarios ->contraseña   = $request->contraseña;
    $usuarios ->save();
    //return $request;	
    //Para mandar a llamar lo de la vista mensaje y ver si si guardo la info
    // return view('Mensaje')
    // ->with('proceso',"Modificacion de Usuarios")
    // ->with('Mensaje',"El Usuario $request->nombre $request->apellido ha sido modificado correctamente");

    Session::flash('mensaje',"El usuario $request->nombre ha sido modificado correctamente");
            return redirect('reporteusuarios');
  }
	
	public function borrausuario($id_usuario){
     //esto es para borrar totalmente un solo registro mediante llave primaria
    $usuarios = usuarios::withTrashed()->find($id_usuario)->forceDelete();
    //Para mandar a llamar lo de la vista Mensaje y ver si si guardo la inf
    //    return view('Mensaje')
    // ->with('proceso',"Borrar Usuarios")
    // ->with('Mensaje',"El Usuario ha sido borrado");
    Session::flash('mensaje',"El usuario a sido eliminado permanentemente");
    return redirect('reporteusuarios');
        
  }
  public function activarusuario($id_usuario){
     //esto es para restaurar un solo registro mediante llave primaria
    $usuarios = usuarios::withTrashed()->where('id_usuario',$id_usuario)->restore();
    //Para mandar a llamar lo de la vista Mensaje y ver si si guardo la info
    //      return view('Mensaje')
    // ->with('proceso',"Activa Usuarios")
    // ->with('Mensaje',"El Usuario ha sido activado correctamente");
    Session::flash('mensaje',"El usuario a sido activado");
            return redirect('reporteusuarios');
  }

  public function desactivausuario($id_usuario){
  	//esto es para eliminar un solo registro mediante llave primaria
    $usuarios = usuarios::find($id_usuario);  
    $usuarios->delete();

    //echo "El Usuario eliminado es $id_usuario Para mandar a llamar lo de la vista Mensaje y ver si si guardo la info
    //     return view('Mensaje')
    // ->with('proceso',"Desactivar Usuarios")
    // ->with('Mensaje',"El Usuario ha sido desactivado correctamente");
    Session::flash('mensaje',"El usuario ha sido desactivado");
            return redirect('reporteusuarios');
  }



	public function reporteusuarios(){
		//consulta que accesa a los modelos y que llama informacion de distintas tablas
    $consulta = usuarios::withTrashed()->join('municipios','usuarios.idmunicipio','=','municipios.idmunicipio')

    ->select('usuarios.id_usuario','usuarios.nombre','usuarios.img','usuarios.ap_paterno','usuarios.ap_materno'
    ,'municipios.nombre as muni','usuarios.email','usuarios.deleted_at')
    
    ->orderBy('usuarios.nombre') //Es para que queden ordenados de forma alfabetica
    ->get();
    return view('reporteusuarios')
    ->with('consulta', $consulta);

  }

    public function Usuarios()
    {
	    $consulta = usuarios::orderBy('id_usuario','DESC')
	    ->take(1)
	    ->get();
	    $cuantos =count($consulta);
	   
	    if($cuantos==0)
	    {
	      $idusigue = 1;  //Con esto se aumenta un numero en la id del empleado
	    }
	    else{

	      $idusigue = $consulta[0]->id_usuario+1;
	      
	    }
 //estas son unas consultas, las cuales mandan a llamar lo que esta en el modelo y se obtiene todo lo que este en la tabla departamentos de la BD y por orden
    $estados = estados::orderBy('nombre')->get();
    $municipios = municipios::orderBy('nombre')->get();

    //return $idusigue;

 //De esta manera es lo que manda a llamar lo que esta en la vista para que llame la info que esta en la bd
    	return view('Usuarios')
    	->with('idusigue',$idusigue)
    	->with('estados',$estados)
    	->with('municipios',$municipios);
    }


    public function Mensaje()
    {
    	return view('Mensaje');
    }

    public function Principal(){
		return view('Principal');
	}


   

    /*public function guardarusuario(Request $request){
    	return $request;

    }*/

    public function guardarusuario(Request $request)
    {	
    	
   /* Esto es para decir que campos son obligadorios y cuales no*/
       
        
        
    $this->validate($request,[
   

    //'id_usuario' => 'required|regex:/^[C][U][-][0-9]{5}$/',
    'img' => 'image|mimes: jpg,jpeg,png,gif,svg',
    'ap_paterno' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'ap_materno' => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',  //Expresion regular
    'nombre'     => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'email'      => 'required|email',
    'sexo'       => 'required',
    'idestado'   => 'required',
    'idmunicipio'=> 'required',
    'localidad'  => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'calle'      => 'required|regex:/^[A-Z][A-Z, a-z, , á,é,í,ó,ú]+$/',
    'cp'         => 'required|regex:/^[0-9]{5}+$/',
    'contraseña' => 'required',
  
  ]);
  //aqui es en donde se hace la insercion en donde se obtienen del modelo usuarios, y se puede registrar un nuevo empleado, se guarda lo que se esta registradndo en el formulario el request nos ayuda a eso
  $file=$request->file('img');
        if($file<>"")
        {
        $img =$file->getClientOriginalName();
        $img2 = $request->id_usuario.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2="sinfoto.jpg";
        } 
  $usuarios = new usuarios; 
    // if ($request->hasFile('img')){
    //         $file           = $request->file("img");
    //         //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
    //         $nombrearchivo  = $file->getClientOriginalName();
    //         $file->move(public_path("img/usuarios/"),$nombrearchivo);
    //         $usuarios->img      = $nombrearchivo;
    //     }

    $usuarios ->id_usuario   = $request->id_usuario; 
    $usuarios ->img          = $img2;
    $usuarios ->ap_paterno   = $request->ap_paterno;
    $usuarios ->ap_materno   = $request->ap_materno;
    $usuarios ->nombre       = $request->nombre;
    $usuarios ->email        = $request->email;
    $usuarios ->sexo         = $request->sexo;
    $usuarios ->idestado     = $request->idestado;
    $usuarios ->idmunicipio  = $request->idmunicipio;
    $usuarios ->localidad    = $request->localidad;  
    $usuarios ->calle        = $request->calle;
    $usuarios ->cp           = $request->cp;
    $usuarios ->contraseña   = $request->contraseña;
    $usuarios ->save();
    //return $request;

    //Para mandar a llamar lo de la vista mensaje y ver si si guardo la info
    // return view('Mensaje')
    // ->with('proceso',"Alta de Usuarios")
    // ->with('Mensaje',"El Usuario $request->nombre $request->apellido ha sido dad@ de alta correctamente");
    
    Session::flash('mensaje',"El usuario $request->nombre ha sido creado correctamente");
            return redirect('reporteusuarios');
    }
}
