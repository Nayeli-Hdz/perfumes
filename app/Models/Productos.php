<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Productos extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $primaryKey = 'id_productos';
    protected $fillable =['id_productos','nombre','id_marca','contenido','precio','descripcion','categoria','codigo','existencia','id_proveedores','tipo','activo']; 

}
