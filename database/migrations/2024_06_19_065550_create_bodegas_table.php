<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mongodb')->create('bodegas', function (Blueprint $collection) {
            $collection->string('Bod_id');
            $collection->string('ubicacion');
            $collection->integer('capacidad');

            $collection->array('inventario_actual', function ($subcollection) {
                $subcollection->string('proveedor_id');
                $subcollection->string('product_id');
                $subcollection->integer('cantidad');
            });

            $collection->array('gerentes', function ($subcollection) {
                $subcollection->string('id');
                $subcollection->string('nombre');
                $subcollection->embedded('informacion_contacto', function ($nestedSubcollection) {
                    $nestedSubcollection->string('email');
                    $nestedSubcollection->string('telefono');
                });
            });

            $collection->array('historial_envios', function ($subcollection) {
                $subcollection->string('id');
                $subcollection->date('fecha');
                $subcollection->array('productos_enviados', function ($nestedSubcollection) {
                    $nestedSubcollection->string('product_id');
                    $nestedSubcollection->integer('cantidad');
                });
                $subcollection->string('distribuidor');
            });

            $collection->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('bodegas');
    }
};
