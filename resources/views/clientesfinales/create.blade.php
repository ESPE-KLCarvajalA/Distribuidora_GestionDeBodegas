@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente Final</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clientesfinales.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="id_cliente">ID Cliente:</label>
                                <input id="id_cliente" type="text" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" value="{{ old('id_cliente') }}" required autocomplete="id_cliente">
                                @error('id_cliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email" type="email" class="form-control @error('informacion_contacto.email') is-invalid @enderror" name="informacion_contacto[email]" value="{{ old('informacion_contacto.email') }}" required autocomplete="email">
                                @error('informacion_contacto.email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input id="telefono" type="text" class="form-control @error('informacion_contacto.telefono') is-invalid @enderror" name="informacion_contacto[telefono]" value="{{ old('informacion_contacto.telefono') }}" required autocomplete="telefono">
                                @error('informacion_contacto.telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input id="direccion" type="text" class="form-control @error('informacion_contacto.direccion') is-invalid @enderror" name="informacion_contacto[direccion]" value="{{ old('informacion_contacto.direccion') }}" required autocomplete="direccion">
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
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="historial_compras[0][product_id]" class="form-control @error('historial_compras.0.product_id') is-invalid @enderror" required>
                                                    <option value="">Selecciona un producto</option>
                                                    @foreach ($productos as $producto)
                                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('historial_compras.0.product_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" class="form-control @error('historial_compras.0.cantidad') is-invalid @enderror" name="historial_compras[0][cantidad]" value="{{ old('historial_compras.0.cantidad') }}" required>
                                                @error('historial_compras.0.cantidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <label>Preferencias:</label>
                                <input type="text" class="form-control @error('preferencias.0') is-invalid @enderror" name="preferencias[0]" value="{{ old('preferencias.0') }}" required>
                                @error('preferencias.0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Cliente Final</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
