<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo';
    protected $fillable =['id_tipo','nombre']; 
}
