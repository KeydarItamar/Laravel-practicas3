<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    use HasFactory;

    protected $table = 'table'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nombre',
        'apellidos',
        'contrasenya',
        'email',
        'rol',
        'actiu',
    ];
}
