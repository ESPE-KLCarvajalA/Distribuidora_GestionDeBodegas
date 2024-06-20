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
                    <div>
                        <strong class="text-dark">ID del Proveedor:</strong> <span class="text-dark">{{ $proveedor->proveedor_id }}</span>
                    </div>
                    <div>
                        <strong class="text-dark">Nombre:</strong> <span class="text-dark">{{ $proveedor->nombre }}</span>
                    </div>
                    <div>
                        <strong class="text-dark">Email:</strong> <span class="text-dark">{{ $proveedor->información_personal['email'] }}</span>
                    </div>
                    <div>
                        <strong class="text-dark">Teléfono:</strong> <span class="text-dark">{{ $proveedor->información_personal['telefono'] }}</span>
                    </div>
                    <div>
                        <strong class="text-dark">Dirección:</strong> <span class="text-dark">{{ $proveedor->información_personal['dirección'] }}</span>
                    </div>
                    <div>
                        <strong class="text-dark">Productos Suministrados:</strong>
                        <ul>
                            @foreach ($proveedor->productos_suministrados as $producto)
                            <li><strong class="text-dark">ID:</strong> <span class="text-dark">{{ $producto['product_id'] }}</span>, <strong class="text-dark">Cantidad:</strong> <span class="text-dark">{{ $producto['cantidad'] }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <strong class="text-dark">Bodegas Suministradas:</strong>
                        <ul>
                            @foreach ($proveedor->bodegas_suministradas as $bodega)
                            <li><span class="text-dark">{{ $bodega }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver al Listado</a>
            </div>
            
        </div>
    </div>
</div>
@endsection