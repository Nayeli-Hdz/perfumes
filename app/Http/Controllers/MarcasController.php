<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcas;
use Session;

class MarcasController extends Controller
{
    public function Marcas(){

        $consulta = marcas::orderBy('id_marca','DESC')
                                    ->take(1)->get();
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idsigue = 1;
        }
        else{
            $idsigue = $consulta[0]->id_marca + 1;
        }
        return view('Marcas')
        ->with('idsigue', $idsigue);

    }

    public function GuardarMarcas(Request $request)
    {
        $id_marca = $request->id_marca;
        $nombre=$request->nombre;
        $activo = $request->activo;

        $this->validate($request,[
            'id_marca'=>'required|integer',
            'nombre'=>'required',
            'activo'=>'required',
            'img'=>'image|mimes:gif,jpeg,jpg,png'
        ]);
        
        $file=$request->file('img');
        if($file<>"")
        {
        $img =$file->getClientOriginalName();
        $img2 = $request->id_marca.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2="sinfoto.jpg";
        }

        $marcas = new marcas();
            $marcas->id_marca=$request->id_marca;
        	$marcas->nombre=$request->nombre;
			$marcas->activo=$request->activo;
            $marcas->img=$img2;
        	$marcas->save();

            Session::flash('mensaje',"La marca $request->nombre ha sido creado correctamente");
            return redirect('ReporteMarcas');

        //return $request; 

     }
     public function ModificarMarca($id)
     {
 
        $consulta = marcas::findOrFail($id);
		return view('EditarMarca', compact('consulta'));
 
     }

     public function EditarMarca(Request $request, $id)
     {
        $this->validate($request,[
            'id_marca'=>'required|integer',
            'nombre'=>'required',
            'img'=>'image|mimes:gif,jpeg,jpg,png'
        ]);
        
        $file=$request->file('img');
        if($file<>"")
        {
        $img =$file->getClientOriginalName();
        $img2 = $request->id_marca.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }
        
        $marcas = marcas::withTrashed()->find($request->id);
            $marcas->id_marca=$request->id_marca;
        	$marcas->nombre=$request->nombre;
            if($file<>"")
            {
            $marcas->img=$img2;
            }
        	$marcas->save();
 
        // marcas::where('id_marca', $id)->update($validacion);
 
         Session::flash('mensaje',"La marca $request->nombre ha sido modificada correctamente");
            return redirect('ReporteMarcas');	
 
     }
     public function ReporteMarcas(){

        $consulta= \DB::select("SELECT *
        FROM marcas");
		//return $consulta;
	return view ('ReporteMarcas')
        ->with('consulta',$consulta);

     }

     public function DesactivarMarca($id)
	{
		 
		//maestros::find($idm)->delete();
		$marcas= \DB:: UPDATE("update marcas 
		set activo = 'No' where id_marca= $id");

		
            return redirect('ReporteMarcas');

            Session::flash('mensaje',"La marca a sido desactivado");
            return redirect('reporteusuarios');
		
		
	}
	public function RestaurarMarca($id)
	{

		$marcas= \DB:: UPDATE("update marcas
		set activo = 'Si' where id_marca= $id");
		
            return redirect('ReporteMarcas');	

            Session::flash('mensaje',"La marca a sido restaurado");
            return redirect('reporteusuarios');	
			
	}
    public function EliminarMarca($id)
	{ 
		$consulta = marcas::withTrashed()->find($id)->forceDelete();


            return redirect('ReporteMarcas');

            Session::flash('mensaje',"La marca a sido eliminado permanentemente");
            return redirect('reporteusuarios');
	}

}
