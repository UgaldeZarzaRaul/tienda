<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consolas extends Model
{
    use HasFactory;
    protected $table = 'tb_consolas';
    protected $primaryKey = 'id_consola';


    protected $fillable = [
        'nombre',
        'clave',
        'marca'
    ];
}
