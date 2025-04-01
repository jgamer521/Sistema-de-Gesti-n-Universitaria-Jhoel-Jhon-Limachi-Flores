<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;

    protected $table = 'configuracions';//Nombre de la tabla en la BD

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'email',
        'web',
        'logo',
    ];

}
