<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class paqueteria extends Model
{
    use HasFactory;
    use SoftDeletes;
     protected $primaryKey ='id_paqueteria';
     protected $fillable = ['id_paqueteria','agencia','sucursal','estado',
     'municipio','calle','numero','codigo_postal','telefono','correo','zona',
     'piezas','dias','horario','tipo_pago','cuenta_bancaria','comision','img'];
}
