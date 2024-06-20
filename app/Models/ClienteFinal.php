<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    // Relación con la colección de productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'product_id', 'historial_compras.product_id');
    }

}
