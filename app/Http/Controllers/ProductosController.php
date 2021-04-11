<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\categorias;
use App\Models\tipos;
use Session;

class ProductosController extends Controller
{
    public function Productos()
    {
        $consulta = productos::orderBy('id_productos','DESC')
                                    ->take(1)->get();
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idsigue = 1;
        }
        else{
            $idsigue = $consulta[0]->id_productos + 1;
        }
        $marcas = Marcas::all();
        $proveedores = Proveedores::all();
        $categorias = categorias::all();
        $tipos = tipos::all();
        return view ('Productos')
        ->with('idsigue', $idsigue)
        ->with('proveedores',$proveedores)
        ->with('categorias',$categorias)
        ->with('tipos',$tipos)
        ->with('marcas',$marcas);
    }

    public function GuardarProductos(Request $request)
    {
        $id_productos = $request->id_productos;
        $nombre = $request->nombre;
        $id_marca = $request->id_marca;
        $contenido = $request->contenido;
        $precio = $request->precio;
        $id_categoria = $request->id_categoria;
        $codigo = $request->codigo;
        $existencia = $request->existencia;
        $id_proveedores = $request->id_proveedores;
        $id_tipo = $request->id_tipo;
        $descripcion = $request->descripcion;
        $activo = $request->activo;
        $img = $request->img;

        $this->validate($request,[
            'id_productos'=>'required|integer',
            'nombre'=>'required', 
            'id_marca'=>'required',
            'contenido'=>['regex:/^[0-9, ,a-z]*$/'],
            'precio'=>'required|numeric',
            'id_categoria'=>'required',
            'codigo'=>['regex:/^[A-Z]{10}$/'],
            'existencia'=>'numeric|regex:/^[0-9]*$/',
            'id_proveedores'=>'required',
            'id_tipo'=>'required',
            'descripcion'=>'required',
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

        $productos= new productos();
            $productos->id_productos=$request->id_productos;
            $productos->nombre=$request->nombre;
        	$productos->id_marca=$request->id_marca;
			$productos->contenido=$request->contenido;
            $productos->precio=$request->precio;
            $productos->id_categoria=$request->id_categoria;
            $productos->codigo=$request->codigo;
            $productos->existencia=$request->existencia;
            $productos->id_proveedores=$request->id_proveedores;
            $productos->id_tipo=$request->id_tipo;
            $productos->descripcion=$request->descripcion;
			$productos->activo=$request->activo;
            $productos->img=$img2;
        	$productos->save();

        Session::flash('mensaje',"El producto $request->nombre ha sido creado correctamente");
        return redirect('ReporteProductos');

        //return $request;
        //echo"Datos guardados";

     }
     public function ModificarProductos($id)
     {
 
 
         $consulta = productos::where('id_productos','=',$id)
                    ->get();
         $mar = marcas::where('id_marca','=',$consulta[0]->id_marca)
                       ->get();
         $nommar =$mar[0]->nombre;
         $marcas = marcas::where('id_marca','!=',$consulta[0]->id_marca)
                      ->get();
        $prov = proveedores::where('id_proveedores','=',$consulta[0]->id_proveedores)
                      ->get();
        $nomprov =$prov[0]->nombre;
        $proveedores = proveedores::where('id_proveedores','!=',$consulta[0]->id_proveedores)
                     ->get();
        $cat = categorias::where('id_categoria','=',$consulta[0]->id_categoria)
                     ->get();
        $nomcat =$cat[0]->nombre;
        $categorias = categorias::where('id_categoria','!=',$consulta[0]->id_categoria)
                    ->get();
        $tip = tipos::where('id_tipo','=',$consulta[0]->id_tipo)
                    ->get();
        $nomtip =$tip[0]->nombre;
        $tipos = tipos::where('id_tipo','!=',$consulta[0]->id_tipo)
                   ->get();
         return view('EditarProductos')
         ->with('consulta',$consulta[0])
         ->with('marcas',$marcas)
         ->with('id_marca',$consulta[0]->id_marca)
         ->with('nommar',$nommar)
         ->with('proveedores',$proveedores)
         ->with('id_proveedores',$consulta[0]->id_proveedores)
         ->with('nomprov',$nomprov)
         ->with('categorias',$categorias)
         ->with('id_categoria',$consulta[0]->id_categoria)
         ->with('nomcat',$nomcat)
         ->with('tipos',$tipos)
         ->with('id_tipo',$consulta[0]->id_tipo)
         ->with('nomtip',$nomtip);
 
     }
     public function EditarProductos(Request $request, $id)
     {
        $this->validate($request,[
            'id_productos'=>'required|integer',
            'nombre'=>'required', 
            'id_marca'=>'required',
            'contenido'=>['regex:/^[0-9, ,a-z]*$/'],
            'precio'=>'required|numeric',
            'id_categoria'=>'required',
            'codigo'=>['regex:/^[A-Z]{10}$/'],
            'existencia'=>'numeric|regex:/^[0-9]*$/',
            'id_proveedores'=>'required',
            'id_tipo'=>'required',
            'descripcion'=>'required',
            'img'=>'image|mimes:gif,jpeg,jpg,png'
        ]);

        $file=$request->file('img');
        if($file<>"")
        {
        $img =$file->getClientOriginalName();
        $img2 = $request->id_marca.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }

        $productos = productos::withTrashed()->find($request->id);
            $productos->id_productos=$request->id_productos;
            $productos->nombre=$request->nombre;
        	$productos->id_marca=$request->id_marca;
			$productos->contenido=$request->contenido;
            $productos->precio=$request->precio;
            $productos->id_categoria=$request->id_categoria;
            $productos->codigo=$request->codigo;
            $productos->existencia=$request->existencia;
            $productos->id_proveedores=$request->id_proveedores;
            $productos->id_tipo=$request->id_tipo;
            $productos->descripcion=$request->descripcion;
            if($file<>"")
            {
            $productos->img=$img2;
            }
        	$productos->save();
 
        // productos::where('id_productos', $id)->update($validacion);
 
        Session::flash('mensaje',"El producto $request->nombre ha sido modificado correctamente");
        return redirect('ReporteProductos');	
 
     }
     public function ReporteProductos(){

        // $consulta= \DB::select("SELECT *
        // FROM productos");
		// //return $consulta;
	    // return view ('ReporteProductos')
        // ->with('consulta',$consulta);

        $consulta=productos::join('marcas','productos.id_marca','=','marcas.id_marca')
        ->join('proveedores','productos.id_proveedores','=','proveedores.id_proveedores')
        ->join('categorias','productos.id_categoria','=','categorias.id_categoria')
        ->join('tipos','productos.id_tipo','=','tipos.id_tipo')
        ->select('productos.nombre','productos.id_productos','marcas.nombre as marcas','productos.contenido','productos.precio'
        ,'productos.codigo','productos.existencia','proveedores.nombre as proveedores','productos.existencia','productos.activo',
        'categorias.nombre as categorias','tipos.nombre as tipos','productos.img')
        ->orderby('productos.nombre')
        ->get();
          return view ('ReporteProductos')
        ->with('consulta',$consulta);


     }
     public function DesactivarProductos($id)
     {
          
         //maestros::find($idm)->delete();
         $productos= \DB:: UPDATE("update productos 
         set activo = 'No' where id_productos= $id");
 
         return redirect('ReporteProductos');
         Session::flash('mensaje',"El producto a sido desactivado");
         return redirect('reporteusuarios');
         
         
     }
     public function RestaurarProductos($id)
     {
 
         $productos= \DB:: UPDATE("update productos
         set activo = 'Si' where id_productos= $id");
         
         return redirect('ReporteProductos');
         Session::flash('mensaje',"El usuario a sido restaurado");
         return redirect('reporteusuarios');		
             
     }
     public function EliminarProductos($id)
     { 
         $consulta = productos::withTrashed()->find($id)->forceDelete();
 
 
             return redirect('ReporteProductos');
             Session::flash('mensaje',"El usuario a sido eliminado permanentemente");
             return redirect('reporteusuarios');
     }
}
