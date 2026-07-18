<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
     protected $fillable = [
        'destinatario',
        'asunto',
        'mensaje',
        'archivo',
        'estado',
        'error_mensaje',
        'user_id'
    ];
}
