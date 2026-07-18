<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'id',
        'nombre',
        'imagen',
        'descripcion',
        'documento',
        'empresa_id',
        'created_at',
        'updated_at'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    }
    public function requisitos()
{
    return $this->hasMany(Requisito::class);
}
   public function tareas()
    {
        return $this->hasMany(Tareas::class);
    }
}
