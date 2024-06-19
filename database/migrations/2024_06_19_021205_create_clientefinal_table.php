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
        Schema::connection('mongodb')->create('clientefinal', function (Blueprint $collection) {
            $collection->string('id_cliente');
            $collection->string('nombre');
            $collection->embedded('informacion_contacto', function ($subcollection) {
                $subcollection->string('email');
                $subcollection->string('telefono');
                $subcollection->string('direccion');
            });
            $collection->array('historial_compras', function ($subcollection) {
                $subcollection->string('id_compra');
                $subcollection->string('product_id');
                $subcollection->integer('cantidad');
                $subcollection->date('fecha_compra');
            });
            $collection->array('preferencias');
            $collection->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('clientefinal');
    }
};
