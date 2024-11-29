<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class digitales extends Model
{
    use HasFactory;
    protected $table = 'tb_digitales';
    protected $primaryKey = 'id_digital';


    protected $fillable = [
        'nombre',
        'precio'
    ];
}
