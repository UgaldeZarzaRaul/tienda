<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videojuego extends Model
{
    use HasFactory;
    protected $table = 'videojuego';
    protected $primaryKey = 'id_videojuego';
    protected $fillable = [
        'nombrej',
        'plataforma',
        'condicion'
        ];
}
