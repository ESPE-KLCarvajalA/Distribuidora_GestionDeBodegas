@extends('layouts.app')

@section('content')
<style>
    strong {
        color: black;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary">Editar Bodega</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bodegas.update', $bodega->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Bod_id"><strong>ID de Bodega</strong></label>
                            <input type="text" class="form-control @error('Bod_id') is-invalid @enderror" id="Bod_id" name="Bod_id" value="{{ old('Bod_id', $bodega->Bod_id) }}" required>
                            @error('Bod_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ubicacion"><strong>Ubicación</strong></label>
                            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $bodega->ubicacion) }}" required>
                            @error('ubicacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="capacidad"><strong>Capacidad</strong></label>
                            <input type="number" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad" value="{{ old('capacidad', $bodega->capacidad) }}" required>
                            @error('capacidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><strong>Inventario Actual</strong></label>
                            <table id="inventario_actual_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Proveedor ID</th>
                                        <th>Product ID</th>
                                        <th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodega->inventario_actual as $index => $item)
                                    <tr>
                                        <td><input type="text" class="form-control" name="inventario_actual[{{ $index }}][proveedor_id]" value="{{ $item['proveedor_id'] }}" required></td>
                                        <td><input type="text" class="form-control" name="inventario_actual[{{ $index }}][product_id]" value="{{ $item['product_id'] }}" required></td>
                                        <td><input type="number" class="form-control" name="inventario_actual[{{ $index }}][cantidad]" value="{{ $item['cantidad'] }}" required></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">Eliminar</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addRow()">Agregar Producto</button>
                        </div>

                        <div class="form-group">
                            <label><strong>Gerentes</strong></label>
                            <table id="gerentes_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodega->gerentes as $index => $gerente)
                                    <tr>
                                        <td><input type="text" class="form-control" name="gerentes[{{ $index }}][id]" value="{{ $gerente['id'] }}" required></td>
                                        <td><input type="text" class="form-control" name="gerentes[{{ $index }}][nombre]" value="{{ $gerente['nombre'] }}" required></td>
                                        <td><input type="email" class="form-control" name="gerentes[{{ $index }}][informacion_contacto][email]" value="{{ $gerente['informacion_contacto']['email'] }}" required></td>
                                        <td><input type="text" class="form-control" name="gerentes[{{ $index }}][informacion_contacto][telefono]" value="{{ $gerente['informacion_contacto']['telefono'] }}" required></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGerente(this)">Eliminar</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addGerente()">Agregar Gerente</button>
                        </div>

                        <div class="form-group">
                            <label><strong>Historial de Envíos</strong></label>
                            <table id="historial_envios_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Productos Enviados</th>
                                        <th>Distribuidor ID</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bodega->historial_envios as $index => $envio)
                                    <tr>
                                        <td><input type="text" class="form-control" name="historial_envios[{{ $index }}][id]" value="{{ $envio['id'] }}" required></td>
                                        <td><input type="date" class="form-control" name="historial_envios[{{ $index }}][fecha]" value="{{ $envio['fecha'] }}" required></td>
                                        <td>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product ID</th>
                                                        <th>Cantidad</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($envio['productos_enviados'] as $i => $producto)
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="historial_envios[{{ $index }}][productos_enviados][{{ $i }}][product_id]" value="{{ $producto['product_id'] }}" required></td>
                                                        <td><input type="number" class="form-control" name="historial_envios[{{ $index }}][productos_enviados][{{ $i }}][cantidad]" value="{{ $producto['cantidad'] }}" required></td>
                                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td><input type="text" class="form-control" name="historial_envios[{{ $index }}][dist_id]" value="{{ $envio['dist_id'] }}" required></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeEnvio(this)">Eliminar</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addEnvio()">Agregar Envío</button>
                        </div>

                        <div class="row mt-4 ">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="{{ route('bodegas.index') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Funciones para agregar y eliminar filas y productos dinámicamente

    // Función para agregar y eliminar filas en el inventario actual
    let rowCount = {{ count($bodega->inventario_actual) }};
    
    function addRow() {
        let table = document.getElementById("inventario_actual_table").getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="inventario_actual[${rowCount}][proveedor_id]" required></td>
            <td><input type="text" class="form-control" name="inventario_actual[${rowCount}][product_id]" required></td>
            <td><input type="number" class="form-control" name="inventario_actual[${rowCount}][cantidad]" required></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">Eliminar</button></td>
        `;
        rowCount++;
    }
    
    function removeRow(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Función para agregar y eliminar gerentes dinámicamente
    let gerenteCount = {{ count($bodega->gerentes) }};
    
    function addGerente() {
        let table = document.getElementById("gerentes_table").getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="gerentes[${gerenteCount}][id]" required></td>
            <td><input type="text" class="form-control" name="gerentes[${gerenteCount}][nombre]" required></td>
            <td><input type="email" class="form-control" name="gerentes[${gerenteCount}][informacion_contacto][email]" required></td>
            <td><input type="text" class="form-control" name="gerentes[${gerenteCount}][informacion_contacto][telefono]" required></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGerente(this)">Eliminar</button></td>
        `;
        gerenteCount++;
    }
    
    function removeGerente(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Funciones para agregar y eliminar envíos en el historial
    let envioCount = {{ count($bodega->historial_envios) }};
    
    function addEnvio() {
        let table = document.getElementById("historial_envios_table").getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="historial_envios[${envioCount}][id]" required></td>
            <td><input type="date" class="form-control" name="historial_envios[${envioCount}][fecha]" required></td>
            <td>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Cantidad</th>
                            <th><button type="button" class="btn btn-sm btn-primary" onclick="addProducto(this)">Agregar Producto</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="historial_envios[${envioCount}][productos_enviados][0][product_id]" required></td>
                            <td><input type="number" class="form-control" name="historial_envios[${envioCount}][productos_enviados][0][cantidad]" required></td>
                            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td><input type="text" class="form-control" name="historial_envios[${envioCount}][dist_id]" required></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeEnvio(this)">Eliminar</button></td>
        `;
        envioCount++;
    }
    
    function removeEnvio(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Funciones para agregar y eliminar productos en el historial de envíos
    function addProducto(btn) {
        let table = btn.parentNode.parentNode.parentNode.getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="historial_envios[${envioCount - 1}][productos_enviados][${table.rows.length - 1}][product_id]" required></td>
            <td><input type="number" class="form-control" name="historial_envios[${envioCount - 1}][productos_enviados][${table.rows.length - 1}][cantidad]" required></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
        `;
    }
    
    function removeProducto(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
@endsection
