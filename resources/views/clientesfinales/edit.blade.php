@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente Final</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clientesfinales.update', $clientefinal->id_cliente) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="id_cliente">ID Cliente:</label>
                                <input id="id_cliente" type="text" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ $clientefinal->id_cliente }}" readonly>
                                @error('id_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $clientefinal->nombre) }}" required autocomplete="nombre">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email" type="email" class="form-control @error('informacion_contacto.email') is-invalid @enderror" name="informacion_contacto[email]" value="{{ old('informacion_contacto.email', $clientefinal->informacion_contacto['email']) }}" required autocomplete="email">
                                @error('informacion_contacto.email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input id="telefono" type="text" class="form-control @error('informacion_contacto.telefono') is-invalid @enderror" name="informacion_contacto[telefono]" value="{{ old('informacion_contacto.telefono', $clientefinal->informacion_contacto['telefono']) }}" required autocomplete="telefono">
                                @error('informacion_contacto.telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input id="direccion" type="text" class="form-control @error('informacion_contacto.direccion') is-invalid @enderror" name="informacion_contacto[direccion]" value="{{ old('informacion_contacto.direccion', $clientefinal->informacion_contacto['direccion']) }}" required autocomplete="direccion">
                                @error('informacion_contacto.direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Historial de Compras:</label>
                                <table class="table table-bordered" id="historial_compras_table">
                                    <thead>
                                        <tr>
                                            <th>ID Compra</th>
                                            <th>Producto ID</th>
                                            <th>Cantidad</th>
                                            <th>Fecha Compra</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientefinal->historial_compras as $index => $compra)
                                            <tr>
                                                <td><input type="text" class="form-control" name="historial_compras[{{ $index }}][id_compra]" value="{{ $compra['id_compra'] }}" required></td>
                                                <td><input type="text" class="form-control" name="historial_compras[{{ $index }}][product_id]" value="{{ $compra['product_id'] }}" required></td>
                                                <td><input type="number" class="form-control" name="historial_compras[{{ $index }}][cantidad]" value="{{ $compra['cantidad'] }}" required></td>
                                                <td><input type="date" class="form-control" name="historial_compras[{{ $index }}][fecha_compra]" value="{{ $compra['fecha_compra'] }}" required></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @error('historial_compras.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Preferencias:</label>
                                @foreach ($clientefinal->preferencias as $index => $preferencia)
                                    <input type="text" class="form-control mb-2" name="preferencias[{{ $index }}]" value="{{ $preferencia }}" required>
                                @endforeach
                                @error('preferencias.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar Cliente Final</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
