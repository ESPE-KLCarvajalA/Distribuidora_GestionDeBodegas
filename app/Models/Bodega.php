<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $collection = 'bodegas';

    protected $fillable = [
        'Bod_id', 'ubicacion', 'capacidad', 'inventario_actual', 'gerentes', 'historial_envios'
    ];

    protected $casts = [
        'inventario_actual' => 'array',
        'gerentes' => 'array',
        'historial_envios' => 'array'
    ];

    

      // Relación con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'product_id');
    }

        // Relación con Proveedores
    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'proveedor_id');
    }

}
