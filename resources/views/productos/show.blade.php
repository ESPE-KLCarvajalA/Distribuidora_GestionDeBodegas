@extends('layouts.app')

@section('content')
    <!-- Asegúrate de que la hoja de estilos personalizada esté correctamente referenciada -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Detalles del Producto</div>

                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $producto->nombre_producto }}</h5>
                        <p class="card-text text-dark"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                        <p class="card-text text-dark"><strong>Precio:</strong> {{ $producto->precio }}</p>
                        <p class="card-text text-dark"><strong>Proveedor:</strong> {{ $producto->proveedor ? $producto->proveedor->nombre : 'No tiene proveedor asociado' }}</p>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver al Listado</a>
                </div>
            </div>
        </div>
    </div>
@endsection
