<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class ClienteFinal extends Model
{
    use HasFactory;
    protected $table = 'clientes_finales'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_cliente'; // Clave primaria

    protected $fillable = [
        'id_cliente',
        'nombre',
        'email',
        'telefono',
        'dirección',
        'historial_compras', // Atributo JSON para almacenar el historial de compras
        'preferencias', // Atributo JSON para almacenar las preferencias
    ];

    // Atributo JSON para historial_compras
    protected $casts = [
        'informacion_contacto' => 'array',
        'historial_compras' => 'array',
        'preferencias' => 'array',
    ];
}
