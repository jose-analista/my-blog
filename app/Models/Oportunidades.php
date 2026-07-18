<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oportunidades extends Model
{
    use HasFactory;
    // Si el archivo se llama Oportunidades.php, descomenta la siguiente línea:
    // protected $table = 'oportunidades';

    protected $fillable = [
        'empresa_id',
        'titulo',
        'valor_estimado',
        'etapa',
        'fecha_cierre_estimada',
        'descripcion'
    ];

    /**
     * Relación: Una oportunidad pertenece a una empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    /**
     * Scope para filtrar por etapa (útil para reportes en tu panel de control)
     */
    public function scopeGanadas($query)
    {
        return $query->where('etapa', 'ganada');
    }
}
