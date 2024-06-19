<!-- resources/views/proveedores/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Proveedor</h1>

        <div>
            <strong>ID del Proveedor:</strong> {{ $proveedor->proveedor_id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $proveedor->nombre }}
        </div>
        <div>
            <strong>Email:</strong> {{ $proveedor->información_personal['email'] }}
        </div>
        <div>
            <strong>Teléfono:</strong> {{ $proveedor->información_personal['telefono'] }}
        </div>
        <div>
            <strong>Dirección:</strong> {{ $proveedor->información_personal['dirección'] }}
        </div>
        <div>
            <strong>Productos Suministrados:</strong>
            <ul>
                @foreach ($proveedor->productos_suministrados as $producto)
                    <li>ID: {{ $producto['product_id'] }}, Cantidad: {{ $producto['cantidad'] }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <strong>Bodegas Suministradas:</strong>
            <ul>
                @foreach ($proveedor->bodegas_suministradas as $bodega)
                    <li>{{ $bodega }}</li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('proveedores.index') }}" class="btn btn-primary mt-3">Volver al Listado</a>
    </div>
@endsection
