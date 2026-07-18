<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'rut',
        'nombre',
        'a_paterno',
        'a_materno',
        'fono',
        'correo',
        'cargo',
         'red_social',
        'empresa_id',
        'created_at',
        'updated_at'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    }
}
