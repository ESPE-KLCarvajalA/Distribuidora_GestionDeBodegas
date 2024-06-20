@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">Detalles de la Bodega</div>

                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-12 col-md-6 mb-3 text-dark">
                            <label for="inventario_actual" class="font-weight-bold">Datos Generales:</label>
                            <dl class="row">
                                <dt class="col-sm-4">ID de Bodega:</dt>
                                <dd class="col-sm-8">{{ $bodega->Bod_id }}</dd>

                                <dt class="col-sm-4">Ubicación:</dt>
                                <dd class="col-sm-8">{{ $bodega->ubicacion }}</dd>

                                <dt class="col-sm-4">Capacidad:</dt>
                                <dd class="col-sm-8">{{ $bodega->capacidad }}</dd>
                            </dl>
                        </div>

                        <div class="col-12 col-md-6 mb-3 text-dark">
                            <div class="form-group">
                                <label for="inventario_actual" class="font-weight-bold">Inventario Actual:</label>
                                <ul class="list-group">
                                    @foreach ($bodega->inventario_actual as $item)
                                    <li class="list-group-item">
                                        <strong>Proveedor ID:</strong> {{ $item['proveedor_id'] }}<br>
                                        <strong>Product ID:</strong> {{ $item['product_id'] }}<br>
                                        <strong>Cantidad:</strong> {{ $item['cantidad'] }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group mt-3 text-dark">
                            <label for="gerentes" class="font-weight-bold">Gerentes:</label>
                            <ul class="list-group">
                                @foreach ($bodega->gerentes as $gerente)
                                <li class="list-group-item">
                                    <strong>ID:</strong> {{ $gerente['id'] }}<br>
                                    <strong>Nombre:</strong> {{ $gerente['nombre'] }}<br>
                                    <strong>Email:</strong> {{ $gerente['informacion_contacto']['email'] }}<br>
                                    <strong>Teléfono:</strong> {{ $gerente['informacion_contacto']['telefono'] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-6 form-group mt-3 text-dark">
                            <label for="historial_envios" class="font-weight-bold">Historial de Envíos:</label>
                            <ul class="list-group">
                                @foreach ($bodega->historial_envios as $envio)
                                <li class="list-group-item">
                                    <strong>ID:</strong> {{ $envio['id'] }}<br>
                                    <strong>Fecha:</strong> {{ $envio['fecha'] }}<br>
                                    <strong>Productos Enviados:</strong>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($envio['productos_enviados'] as $producto)
                                        <li class="list-group-item">
                                            <strong>Product ID:</strong> {{ $producto['product_id'] }}<br>
                                            <strong>Cantidad:</strong> {{ $producto['cantidad'] }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    <strong>Dist ID:</strong> {{ $envio['dist_id'] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="row mt-4 ">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('bodegas.index') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection