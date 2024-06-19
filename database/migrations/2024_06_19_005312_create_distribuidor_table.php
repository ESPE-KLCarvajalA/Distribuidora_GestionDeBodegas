<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('distribuidor', function (Blueprint $collection) {
            $collection->string('dist_id')->unique();
            $collection->string('nombre');
            $collection->embedded('informacion_contacto', function ($subcollection) {
                $subcollection->string('email');
                $subcollection->string('telefono');
                $subcollection->string('direccion');
            });
            $collection->array('regiones_distribucion');
            $collection->array('productos_distribuidos', function ($subcollection) {
                $subcollection->string('product_id');
                $subcollection->integer('cantidad');
            });
            $collection->array('contratos', function ($subcollection) {
                $subcollection->string('contrato_id');
                $subcollection->date('fecha_inicio');
                $subcollection->date('fecha_fin');
            });
            $collection->array('historial_entregas', function ($subcollection) {
                $subcollection->string('id_entrega');
                $subcollection->date('fecha');
                $subcollection->array('productos_entregados', function ($subsubcollection) {
                    $subsubcollection->string('product_id');
                    $subsubcollection->integer('cantidad');
                });
                $subcollection->string('id_cliente');
            });
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('distribuidor');
    }
};
