<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    
    use HasFactory;
    protected $table = 'tb_clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'contraseña'
    ];
    
}
