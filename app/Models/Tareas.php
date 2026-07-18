<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = [
        'requisito_id',
        'proyecto_id',
        'user_id',
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'completada',
        'prioridad',
    ];

    // Tratamos fecha_vencimiento como un objeto Carbon
    protected $dates = ['fecha_vencimiento'];

    /**
     * Relación: Una tarea es asignada a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    /**
     * Scope para obtener solo las tareas pendientes
     */
    public function scopePendientes($query)
    {
        return $query->where('completada', false)
            ->where('fecha_vencimiento', '>=', Carbon::now());
    }
}
