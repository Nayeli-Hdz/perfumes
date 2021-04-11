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
}
