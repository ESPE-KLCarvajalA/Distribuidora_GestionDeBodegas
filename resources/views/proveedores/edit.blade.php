@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Proveedor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="proveedor_id">ID del Proveedor</label>
                <input type="text" name="proveedor_id" class="form-control" id="proveedor_id" value="{{ $proveedor->proveedor_id }}" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre del Proveedor</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $proveedor->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="información_personal[email]" class="form-control" id="email" value="{{ $proveedor->información_personal['email'] }}" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="información_personal[telefono]" class="form-control" id="telefono" value="{{ $proveedor->información_personal['telefono'] }}" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="información_personal[dirección]" class="form-control" id="direccion" value="{{ $proveedor->información_personal['dirección'] }}" required>
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
                        @foreach ($proveedor->productos_suministrados as $index => $producto)
                            <tr>
                                <td><input type="text" name="productos_suministrados[{{ $index }}][product_id]" class="form-control" value="{{ $producto['product_id'] }}" required></td>
                                <td><input type="number" name="productos_suministrados[{{ $index }}][cantidad]" class="form-control" value="{{ $producto['cantidad'] }}" required></td>
                            </tr>
                        @endforeach
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
                        @foreach ($proveedor->bodegas_suministradas as $index => $bodega)
                            <tr>
                                <td><input type="text" name="bodegas_suministradas[]" class="form-control" value="{{ $bodega }}" required></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="agregarBodega()">Agregar Bodega</button>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
        </form>
    </div>

    <script>
        let productoIndex = {{ count($proveedor->productos_suministrados) }};
        function agregarProducto() {
            let html = `<tr>
                            <td><input type="text" name="productos_suministrados[${productoIndex}][product_id]" class="form-control" required></td>
                            <td><input type="number" name="productos_suministrados[${productoIndex}][cantidad]" class="form-control" required></td>
                        </tr>`;
            $('#productos tbody').append(html);
            productoIndex++;
        }

        let bodegaIndex = {{ count($proveedor->bodegas_suministradas) }};
        function agregarBodega() {
            let html = `<tr>
                            <td><input type="text" name="bodegas_suministradas[]" class="form-control" required></td>
                        </tr>`;
            $('#bodegas tbody').append(html);
            bodegaIndex++;
        }
    </script>
@endsection
