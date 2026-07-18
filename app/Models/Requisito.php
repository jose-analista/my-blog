<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'titulo',
        'descripcion',
        'horas_estimadas',
        'valor_hora',
        'costo_estimado',
        'prioridad',
        'estado'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
    

    public function tareas()
    {
        return $this->hasMany(Tareas::class);
    }
}