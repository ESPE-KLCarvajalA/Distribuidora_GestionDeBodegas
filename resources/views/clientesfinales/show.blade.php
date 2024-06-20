@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Cliente Final</h1>
    <div class="card">
        <div class="card-header">
            Información del Cliente
        </div>
        <div class="card-body">
            <p><strong>ID Cliente:</strong> {{ $clientefinal->id_cliente }}</p>
            <p><strong>Nombre:</strong> {{ $clientefinal->nombre }}</p>
            <p><strong>Email:</strong> {{ $clientefinal->informacion_contacto['email'] }}</p>
            <p><strong>Teléfono:</strong> {{ $clientefinal->informacion_contacto['telefono'] }}</p>
            <p><strong>Dirección:</strong> {{ $clientefinal->informacion_contacto['direccion'] }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Historial de Compras
        </div>
        <div class="card-body">
            @if (count($clientefinal->historial_compras) > 0)
                <ul>
                    @foreach ($clientefinal->historial_compras as $compra)
                        @php
                            $producto = $productos->firstWhere('id', $compra['product_id']);
                        @endphp
                        <li>
                            <strong>Producto:</strong> {{ $producto ? $producto->nombre_producto : 'Producto no encontrado' }}<br>
                            <strong>Cantidad:</strong> {{ $compra['cantidad'] }}<br>
                            <strong>Fecha de Compra:</strong> {{ $compra['fecha_compra'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No hay historial de compras.</p>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Preferencias
        </div>
        <div class="card-body">
            @if (count($clientefinal->preferencias) > 0)
                <ul>
                    @foreach ($clientefinal->preferencias as $preferencia)
                        <li>{{ $preferencia }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay preferencias.</p>
            @endif
        </div>
    </div>

    
    <a href="{{ route('clientesfinales.index') }}" class="btn btn-secondary mt-4">Volver</a>
</div>
@endsection
