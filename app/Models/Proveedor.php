<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'proveedor';

    protected $fillable = [
        'proveedor_id', 'nombre', 'información_personal', 'productos_suministrados', 'bodegas_suministradas'
    ];

    protected $casts = [
        'información_personal' => 'array',
        'productos_suministrados' => 'array',
        'bodegas_suministradas' => 'array',
    ];
}
