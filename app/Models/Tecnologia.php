<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;
    protected $table = 'tecnologias';

    protected $fillable = [
        'id',
        'nombre',
        'tipo',
        'imagen',
        'created_at',
        'updated_at'
    ];
}
