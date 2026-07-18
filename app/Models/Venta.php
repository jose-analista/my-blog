<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'id',
        'cliente_id',
        'empresa_id',
        'proyecto_id',
        'precio',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id','id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id','id');
    }
    public function servicios()
{
    return $this->belongsToMany(Servicio::class)
        ->withPivot('cantidad', 'precio')
        ->withTimestamps();
}
}