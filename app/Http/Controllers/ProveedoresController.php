<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Models\Marcas;
use Session;

class ProveedoresController extends Controller
{
    public function Proveedores(){

        $consulta = proveedores::orderBy('id_proveedores','DESC')
                                    ->take(1)->get();
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idsigue = 1;
        }
        else{
            $idsigue = $consulta[0]->id_proveedores + 1;
        }
        $marcas = Marcas::all();
        return view('Proveedores')
        ->with('idsigue', $idsigue)
        ->with('marcas',$marcas);
		

    }

    public function GuardarProveedores(Request $request)
    {
        $id_proveedores = $request->id_proveedores;
        $nombre = $request->nombre;
        $email=$request->email;
        $telefono=$request->telefono;
        $codigo=$request->codigo;
        $id_marca=$request->id_marca;
        $activo = $request->activo;

        $this->validate($request,[
            'id_proveedores'=>'required|integer',
            'nombre'=>'required|alpha', 
            'email'=>'required|email',
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'id_marca'=>'required',
            'codigo'=>'regex:/^[A-Z]{10}$/',
            'activo'=>'required'
        ]);

        $proveedores= new proveedores();
            $proveedores->id_proveedores=$request->id_proveedores;
            $proveedores->nombre=$request->nombre;
        	$proveedores->email=$request->email;
			$proveedores->telefono=$request->telefono;
            $proveedores->codigo=$request->codigo;
            $proveedores->id_marca=$request->id_marca;
			$proveedores->activo=$request->activo;
        	$proveedores->save();

            Session::flash('mensaje',"El proveedor $request->nombre ha sido creado correctamente");
            return redirect('ReporteProveedores');

     }
     public function ModificarProveedores($id)
    {


		$consulta = proveedores::where('id_proveedores','=',$id)
		           ->get();
	    $mar = marcas::where('id_marca','=',$consulta[0]->id_marca)
		              ->get();
		$nommar =$mar[0]->nombre;
		$marcas = marcas::where('id_marca','!=',$consulta[0]->id_marca)
		             ->get();
		return view('EditarProveedores')
		->with('consulta',$consulta[0])
		->with('marcas',$marcas)
		->with('id_marca',$consulta[0]->id_marca)
		->with('nommar',$nommar);

    }

    public function EditarProveedores(Request $request, $id)
	{
		$validacion = $request->validate([
            'id_proveedores'=>'required', 
            'nombre'=>'required|alpha', 
            'email'=>'required|email',
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'id_marca'=>'required',
            'codigo'=>'regex:/^[A-Z]{10}$/',
            
		]);

		proveedores::where('id_proveedores', $id)->update($validacion);

		Session::flash('mensaje',"El proveedor $request->nombre ha sido modificado correctamente");
            return redirect('ReporteProveedores');

	}
    public function ReporteProveedores(){

        //     $consulta= \DB::select("SELECT *
        //     FROM proveedores");
        // 	//return $consulta;
        // return view ('ReporteProveedores')
        //     ->with('consulta',$consulta);
    
        $consulta=proveedores::join('marcas','proveedores.id_marca','=','marcas.id_marca')
        ->select('proveedores.id_proveedores','proveedores.nombre',
        'proveedores.email','proveedores.telefono','proveedores.codigo','marcas.nombre as marcas',
        'proveedores.activo','proveedores.deleted_at')
        ->orderby('proveedores.nombre')
        ->get();
    
        return view ('ReporteProveedores')
            ->with('consulta',$consulta);
    
         }
    
         public function DesactivarProveedores($id)
        { 
            //maestros::find($idm)->delete();
            $proveedores= \DB:: UPDATE("update proveedores 
            set activo = 'No' where id_proveedores= $id");
    
            // $proveedores = proveedores::find($id);
            // $proveedores->delete();
    
                return redirect('ReporteProveedores');
                Session::flash('mensaje',"El usuario a sido desactivado");
                return redirect('reporteusuarios');
        }
        public function RestaurarProveedores($id)
        {
    
            $proveedores= \DB:: UPDATE("update proveedores
            set activo = 'Si' where id_proveedores= $id");
            
                return redirect('ReporteProveedores');	
                Session::flash('mensaje',"El usuario a sido restaurado");
                return redirect('reporteusuarios');	
                
        }
        public function EliminarProveedores($id)
        { 
            $consulta = proveedores::withTrashed()->find($id)->forceDelete();
    
    
                return redirect('ReporteProveedores');
                Session::flash('mensaje',"El usuario a sido eliminado permanentemente");
                return redirect('reporteusuarios');
        }

}
