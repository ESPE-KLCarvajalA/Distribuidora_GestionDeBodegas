@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Producto</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                <p class="card-text"><strong>Precio:</strong> {{ $producto->precio }}</p>
                <p class="card-text"><strong>Proveedor:</strong> {{ $producto->proveedor ? $producto->proveedor->nombre : 'Sin proveedor' }}</p>
            </div>
        </div>

        <a href="{{ route('productos.index') }}" class="btn btn-primary mt-3">Volver al Listado</a>
    </div>
@endsection