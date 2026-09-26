<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
        protected $fillable = ['nombre', 'codigo', 'imagen', 'categoria', 'descripcion'];
}
