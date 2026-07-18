<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';  

    protected $fillable = [
        'id',
        'rut',
        'nombre',
        'ubicacion',
        'fono',
        'correo',
        'url',
        'razon_social',
        'created_at',
        'updated_at'
    ];
}
