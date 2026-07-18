<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    use HasFactory;
    protected $table = 'educacions';  

    protected $fillable = [
        'id',
        'nombre',
        'inicio',
        'termino',
        'institucion',
        'descripcion',
        'created_at',
        'updated_at'
    ];
}
