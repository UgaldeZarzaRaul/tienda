<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nuevos extends Model
{
    use HasFactory;
    protected $table = 'tb_nuevos';
    protected $primaryKey = 'id_nuevo';


    protected $fillable = [
        'nombre',
        'precio'
    ];
}
