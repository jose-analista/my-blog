<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    // Definimos los campos que pueden ser llenados de forma masiva
    protected $fillable = [
        'nombre',
        'categoria',
        'modelo_cobro',
        'tarifa_base',
        'moneda',
        'estado',
        'exclusiones'
    ];

    // Opcional: Esto ayuda a que el precio siempre se trate con 2 decimales
    protected $casts = [
        'tarifa_base' => 'decimal:2',
    ];
    public function ventas()
{
    return $this->belongsToMany(Venta::class)
        ->withPivot('cantidad', 'precio')
        ->withTimestamps();
}
}
