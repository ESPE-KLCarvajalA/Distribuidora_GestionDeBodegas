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
        Schema::connection('mongodb')->create('productos', function (Blueprint $collection) {
            $collection->string('product_id')->primary();
            $collection->string('nombre_producto');
            $collection->string('descripcion');
            $collection->decimal('precio', 8, 2);
            $collection->string('proveedor_id');
            $collection->timestamps();

            // Referencia a proveedores
            $collection->foreign('proveedor_id')
                ->references('_id')
                ->on('proveedor')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('productos');
    }
};
