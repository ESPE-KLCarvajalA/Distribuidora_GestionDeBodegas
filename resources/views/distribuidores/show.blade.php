<!-- resources/views/distribuidores/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Distribuidor</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $distribuidor->nombre }}</h2>
            </div>
            <div class="card-body">
                <h4>Información de Contacto</h4>
                <p>Email: {{ $distribuidor->informacion_contacto['email'] ?? 'No disponible' }}</p>
                <p>Teléfono: {{ $distribuidor->informacion_contacto['telefono'] ?? 'No disponible' }}</p>
                <p>Dirección: {{ $distribuidor->informacion_contacto['direccion'] ?? 'No disponible' }}</p>

                <h4>Regiones de Distribución</h4>
                <ul>
                    @if(isset($distribuidor->regiones_distribucion) && is_array($distribuidor->regiones_distribucion))
                        @foreach ($distribuidor->regiones_distribucion as $region)
                            <li>{{ $region }}</li>
                        @endforeach
                    @else
                        <li>No disponible</li>
                    @endif
                </ul>

                <h4>Productos Distribuidos</h4>
                <ul>
                    @if(isset($distribuidor->productos_distribuidos) && is_array($distribuidor->productos_distribuidos))
                        @foreach ($distribuidor->productos_distribuidos as $producto)
                            <li>Producto ID: {{ $producto['product_id'] ?? 'No disponible' }} - Cantidad: {{ $producto['cantidad'] ?? 'No disponible' }}</li>
                        @endforeach
                    @else
                        <li>No disponible</li>
                    @endif
                </ul>

                <h4>Contratos</h4>
                <ul>
                    @if(isset($distribuidor->contratos) && is_array($distribuidor->contratos))
                        @foreach ($distribuidor->contratos as $contrato)
                            <li>
                                Contrato ID: {{ $contrato['contrato_id'] ?? 'No disponible' }},
                                Fecha de Inicio: {{ $contrato['fecha_inicio'] ?? 'No disponible' }},
                                Fecha de Fin: {{ $contrato['fecha_fin'] ?? 'No disponible' }}
                            </li>
                        @endforeach
                    @else
                        <li>No disponible</li>
                    @endif
                </ul>

                <h4>Historial de Entregas</h4>
                <ul>
                    @if(isset($distribuidor->historial_entregas) && is_array($distribuidor->historial_entregas))
                        @foreach ($distribuidor->historial_entregas as $entrega)
                            <li>
                                ID de Entrega: {{ $entrega['id_entrega'] ?? 'No disponible' }},
                                Fecha: {{ $entrega['fecha'] ?? 'No disponible' }},
                                ID del Cliente: {{ $entrega['id_cliente'] ?? 'No disponible' }},
                                Productos Entregados:
                                <ul>
                                    @foreach ($entrega['productos_entregados'] as $producto)
                                        <li>Producto ID: {{ $producto['product_id'] ?? 'No disponible' }} - Cantidad: {{ $producto['cantidad'] ?? 'No disponible' }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    @else
                        <li>No disponible</li>
                    @endif
                </ul>
            </div>
        </div>
        <a href="{{ route('distribuidores.index') }}" class="btn btn-primary mt-3">Volver al Listado</a>
    </div>
@endsection
