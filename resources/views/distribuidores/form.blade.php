@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($distribuidor) ? 'Editar Distribuidor' : 'Crear Distribuidor' }}</div>

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

                        <form action="{{ isset($distribuidor) ? route('distribuidores.update', $distribuidor->id) : route('distribuidores.store') }}" method="POST">
                            @csrf
                            @if (isset($distribuidor))
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="dist_id">ID de Distribuidor</label>
                                <input type="text" class="form-control" id="dist_id" name="dist_id" value="{{ old('dist_id', isset($distribuidor) ? $distribuidor->dist_id : '') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', isset($distribuidor) ? $distribuidor->nombre : '') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="información_contacto_email">Email de Contacto</label>
                                <input type="email" class="form-control" id="información_contacto_email" name="información_contacto[email]" value="{{ old('información_contacto.email', isset($distribuidor) ? $distribuidor->información_contacto['email'] : '') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="información_contacto_telefono">Teléfono de Contacto</label>
                                <input type="text" class="form-control" id="información_contacto_telefono" name="información_contacto[telefono]" value="{{ old('información_contacto.telefono', isset($distribuidor) ? $distribuidor->información_contacto['telefono'] : '') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="información_contacto_dirección">Dirección de Contacto</label>
                                <input type="text" class="form-control" id="información_contacto_dirección" name="información_contacto[dirección]" value="{{ old('información_contacto.dirección', isset($distribuidor) ? $distribuidor->información_contacto['dirección'] : '') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="regiones_distribución">Regiones de Distribución</label>
                                <select multiple class="form-control" id="regiones_distribución" name="regiones_distribución[]" required>
                                    @php
                                        $regiones = ['Pichincha', 'Cotopaxi', 'Otros']; // Ejemplo de datos de regiones
                                    @endphp
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region }}" {{ in_array($region, old('regiones_distribución', isset($distribuidor) ? $distribuidor->regiones_distribución : [])) ? 'selected' : '' }}>{{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Productos Distribuidos</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Producto</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (old('productos_distribuidos', isset($distribuidor) ? $distribuidor->productos_distribuidos : []) as $key => $producto)
                                            <tr>
                                                <td><input type="text" class="form-control" name="productos_distribuidos[{{ $key }}][product_id]" value="{{ $producto['product_id'] }}" required></td>
                                                <td><input type="number" class="form-control" name="productos_distribuidos[{{ $key }}][cantidad]" value="{{ $producto['cantidad'] }}" required></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ isset($distribuidor) ? 'Actualizar' : 'Crear' }}</button>
                            <a href="{{ route('distribuidores.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
