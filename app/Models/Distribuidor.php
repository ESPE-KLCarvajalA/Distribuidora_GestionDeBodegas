<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;

class Distribuidor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'distribuidor';

    protected $fillable = [
        'dist_id', 'nombre', 'informacion_contacto', 'regiones_distribucion', 
        'productos_distribuidos', 'contratos', 'historial_entregas'
    ];

    protected $casts = [
        'informacion_contacto' => 'array',
        'regiones_distribucion' => 'array',
        'productos_distribuidos' => 'array',
        'contratos' => 'array',
        'historial_entregas' => 'array',
    ];

    // Relación con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'dist_id');
    }


    // Relación con Clientes
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'dist_id');
    }


}
