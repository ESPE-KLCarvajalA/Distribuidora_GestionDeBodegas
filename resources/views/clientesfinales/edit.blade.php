@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente Final</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('clientesfinales.update', $cliente->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_cliente">ID Cliente</label>
                                <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ old('id_cliente', $cliente->id_cliente) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="informacion_contacto">Información de Contacto</label>
                                <input type="text" class="form-control" id="informacion_contacto" name="informacion_contacto" value="{{ old('informacion_contacto', $cliente->informacion_contacto) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="historial_compras">Historial de Compras</label>
                                <textarea class="form-control" id="historial_compras" name="historial_compras" rows="3" required>{{ old('historial_compras', $cliente->historial_compras) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="preferencias">Preferencias</label>
                                <select multiple class="form-control" id="preferencias" name="preferencias[]" required>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto }}" {{ in_array($producto, old('preferencias', $cliente->preferencias)) ? 'selected' : '' }}>{{ $producto }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
