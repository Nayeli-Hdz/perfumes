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
}
