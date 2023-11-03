<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table = 'estudiantes';

    // campos de la tabla
    protected $fillable = [
        'nombre',
        'edad',
        'correo',
        'telefono'
    ];
}
