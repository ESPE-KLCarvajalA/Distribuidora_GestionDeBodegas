@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente Final</div>

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

                        <form action="{{ route('clientesfinales.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="id_cliente">ID Cliente</label>
                                <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ old('id_cliente') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="informacion_contacto_email">Email</label>
                                <input type="email" class="form-control" id="informacion_contacto_email" name="informacion_contacto[email]" value="{{ old('informacion_contacto.email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="informacion_contacto_telefono">Teléfono</label>
                                <input type="text" class="form-control" id="informacion_contacto_telefono" name="informacion_contacto[telefono]" value="{{ old('informacion_contacto.telefono') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="informacion_contacto_direccion">Dirección</label>
                                <input type="text" class="form-control" id="informacion_contacto_direccion" name="informacion_contacto[direccion]" value="{{ old('informacion_contacto.direccion') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="preferencias">Preferencias</label>
                                <select multiple class="form-control" id="preferencias" name="preferencias[]">
                                    <!-- Agregar opciones según sea necesario -->
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('clientesfinales.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
