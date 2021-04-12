<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class usuarios extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_usuario','img','ap_paterno', 'ap_materno', 'nombre', 'email', 'sexo',
    'idestado','idmunicipio','localidad','calle','cp','contraseña'];
}
