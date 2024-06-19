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
        Schema::connection('mongodb')->create('proveedor', function (Blueprint $collection) {
            $collection->id();
            $collection->string('proveedor_id')->unique();
            $collection->string('nombre');
            $collection->embedded('información_personal', function ($subcollection) {
                $subcollection->string('email');
                $subcollection->string('telefono');
                $subcollection->string('dirección');
            });
            $collection->array('productos_suministrados', function ($subcollection) {
                $subcollection->string('product_id');
                $subcollection->integer('cantidad');
            });
            $collection->array('bodegas_suministradas');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('proveedor');
    }
};
