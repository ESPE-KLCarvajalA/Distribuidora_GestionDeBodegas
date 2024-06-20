<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;


class Producto extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb'; // Conexión MongoDB

    protected $collection = 'productos'; // Nombre de la colección en MongoDB

    protected $primaryKey = 'product_id'; // Clave primaria

    protected $fillable = [
        'product_id',
        'nombre_producto',
        'descripcion',
        'precio',
        
    ];
    

}
