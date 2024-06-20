@extends('layouts.app')

@section('content')
<style>
    label{
        color: black;
    }
</style>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Crear Nuevo Proveedor
            </div>

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

                <form action="{{ route('proveedores.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="proveedor_id">ID del Proveedor</label>
                        <input type="text" name="proveedor_id" class="form-control" id="proveedor_id" value="{{ old('proveedor_id') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre del Proveedor</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="información_personal[email]" class="form-control" id="email" value="{{ old('información_personal.email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="información_personal[telefono]" class="form-control" id="telefono" value="{{ old('información_personal.telefono') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="información_personal[dirección]" class="form-control" id="direccion" value="{{ old('información_personal.dirección') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="productos">Productos Suministrados</label>
                        <table class="table" id="productos">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="productos_suministrados[0][product_id]" class="form-control" value="{{ old('productos_suministrados.0.product_id') }}" required></td>
                                    <td><input type="number" name="productos_suministrados[0][cantidad]" class="form-control" value="{{ old('productos_suministrados.0.cantidad') }}" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar Producto</button>
                    </div>

                    <div class="form-group">
                        <label for="bodegas">Bodegas Suministradas</label>
                        <table class="table" id="bodegas">
                            <thead>
                                <tr>
                                    <th>Bodega</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="bodegas_suministradas[]" class="form-control" value="{{ old('bodegas_suministradas.0') }}" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" onclick="agregarBodega()">Agregar Bodega</button>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success">Guardar Proveedor</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
            </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let productoIndex = 1;
        function agregarProducto() {
            let html = `<tr>
                            <td><input type="text" name="productos_suministrados[${productoIndex}][product_id]" class="form-control" required></td>
                            <td><input type="number" name="productos_suministrados[${productoIndex}][cantidad]" class="form-control" required></td>
                        </tr>`;
            $('#productos tbody').append(html);
            productoIndex++;
        }

        let bodegaIndex = 1;
        function agregarBodega() {
            let html = `<tr>
                            <td><input type="text" name="bodegas_suministradas[]" class="form-control" required></td>
                        </tr>`;
            $('#bodegas tbody').append(html);
            bodegaIndex++;
        }
    </script>
@endsection
