<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Proveedores extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'id_proveedores';
    protected $fillable =['id_proveedores','nombre','correo','telefono','id_marca','direccion','codigo_postal']; 
}
