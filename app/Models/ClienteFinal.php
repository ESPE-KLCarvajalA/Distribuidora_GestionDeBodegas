<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;

class ClienteFinal extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'clientefinal';

    protected $fillable = [
        'id_cliente',
        'nombre',
        'informacion_contacto',
        'historial_compras',
        'preferencias',
    ];

    protected $casts = [
        'informacion_contacto' => 'array',
        'historial_compras' => 'array',
        'preferencias' => 'array',
    ];
}
