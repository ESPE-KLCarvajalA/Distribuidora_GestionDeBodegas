@extends('layouts.app')

@section('content')
<style>
    strong {
        color: black;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Editar Proveedor</div>

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

                    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="proveedor_id"><strong>ID del Proveedor</strong></label>
                            <input type="text" name="proveedor_id" class="form-control" id="proveedor_id" value="{{ $proveedor->proveedor_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre"><strong>Nombre del Proveedor</strong></label>
                            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $proveedor->nombre }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><strong>Email</strong></label>
                            <input type="email" name="información_personal[email]" class="form-control" id="email" value="{{ $proveedor->información_personal['email'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono"><strong>Teléfono</strong></label>
                            <input type="text" name="información_personal[telefono]" class="form-control" id="telefono" pattern="[0-9]+" value="{{ $proveedor->información_personal['telefono'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion"><strong>Dirección</strong></label>
                            <input type="text" name="información_personal[dirección]" class="form-control" id="direccion" value="{{ $proveedor->información_personal['dirección'] }}" required>
                        </div>

                        <div class="form-group">
                            <label for="productos"><strong>Productos Suministrados</strong></label>
                            <table class="table table-bordered" id="productos">
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
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarProducto()">Agregar Producto</button>
                        </div>

                        <div class="form-group">
                            <label for="bodegas"><strong>Bodegas Suministradas</strong></label>
                            <table class="table table-bordered" id="bodegas">
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
                            <button type="button" class="btn btn-primary mt-2" onclick="agregarBodega()">Agregar Bodega</button>
                        </div>

                        <div class="row mt-4 ">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">Actualizar Proveedor</button>
                                <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let productoIndex = {
        {
            count($proveedor - > productos_suministrados)
        }
    };

    function agregarProducto() {
        let html = `<tr>
                        <td><input type="text" name="productos_suministrados[${productoIndex}][product_id]"
                                class="form-control" required></td>
                        <td><input type="number" name="productos_suministrados[${productoIndex}][cantidad]"
                                class="form-control" required></td>
                    </tr>`;
        $('#productos tbody').append(html);
        productoIndex++;
    }

    let bodegaIndex = {
        {
            count($proveedor - > bodegas_suministradas)
        }
    };

    function agregarBodega() {
        let html = `<tr>
                        <td><input type="text" name="bodegas_suministradas[]" class="form-control" required></td>
                    </tr>`;
        $('#bodegas tbody').append(html);
        bodegaIndex++;
    }
</script>
@endsection