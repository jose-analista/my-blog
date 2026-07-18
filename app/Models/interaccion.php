<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interaccion extends Model
{
    use HasFactory;
    protected $table = 'interaccions';  
// 2. Definimos los campos que se pueden llenar masivamente (Mass Assignment)
    protected $fillable = [
        'empresa_id',
        'user_id',
        'tipo',
        'notas',
        'fecha_interaccion',
    ];

    // 3. Cast de fechas para que Laravel las trate como objetos Carbon
    protected $dates = [
        'fecha_interaccion',
    ];

    /**
     * Relación: Una interacción pertenece a una empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    /**
     * Relación: Una interacción fue registrada por un usuario (analista/vendedor).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
