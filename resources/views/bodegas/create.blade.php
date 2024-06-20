@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            Crear Nueva Bodega
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

            <form action="{{ route('bodegas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Bod_id" style="color:black;">ID de Bodega</label>
                    <input type="text" class="form-control" id="Bod_id" name="Bod_id" value="{{ old('Bod_id') }}" required>
                </div>
                <div class="form-group">
                    <label for="ubicacion" style="color:black;">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                </div>
                <div class="form-group">
                    <label for="capacidad" style="color:black;">Capacidad</label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
                </div>

                <div class="form-group">
                    <label for="inventario_actual" style="color:black;">Inventario Actual</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Proveedor ID</th>
                                <th>Product ID</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="inventario_actual_table">
                            <tr>
                                <td><input type="text" class="form-control" name="inventario_actual[0][proveedor_id]" required></td>
                                <td><input type="text" class="form-control" name="inventario_actual[0][product_id]" required></td>
                                <td><input type="number" class="form-control" name="inventario_actual[0][cantidad]" required></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addRow()">Agregar Producto</button>
                </div>

                <div class="form-group">
                    <label for="gerentes" style="color:black;">Gerentes</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="gerentes_table">
                            <tr>
                                <td><input type="text" class="form-control" name="gerentes[0][id]" required></td>
                                <td><input type="text" class="form-control" name="gerentes[0][nombre]" required></td>
                                <td><input type="email" class="form-control" name="gerentes[0][informacion_contacto][email]" required></td>
                                <td><input type="text" class="form-control" name="gerentes[0][informacion_contacto][telefono]" required></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeGerente(this)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addGerente()">Agregar Gerente</button>
                </div>

                <div class="form-group">
                    <label for="historial_envios" style="color:black;">Historial de Envíos</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Productos Enviados</th>
                                <th>Distribuidor ID</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="historial_envios_table">
                            <tr>
                                <td><input type="text" class="form-control" name="historial_envios[0][id]" required></td>
                                <td><input type="date" class="form-control" name="historial_envios[0][fecha]" required></td>
                                <td>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="historial_envios[0][productos_enviados][0][product_id]" required></td>
                                                <td><input type="number" class="form-control" name="historial_envios[0][productos_enviados][0][cantidad]" required></td>
                                                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td><input type="text" class="form-control" name="historial_envios[0][dist_id]" required></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeEnvio(this)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addEnvio()">Agregar Envío</button>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

    <script>
        // Funciones para agregar y eliminar filas dinámicamente
        let rowCount = 1;
        
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

        let gerenteCount = 1;
        
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

        let envioCount = 1;
        
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
                <td><input type="text" class="form-control" name="historial_envios[${envioCount}][productos_enviados][0][product_id]" required></td>
                                <td><input type="number" class="form-control" name="historial_envios[`${envioCount}][productos_enviados][0][cantidad]" required></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td><input type="text" class="form-control" name="historial_envios[${envioCount}][dist_id]" required></td>
                <td><button type="button" class="btn btn-sm btn-danger" onclick="removeEnvio(this)">Eliminar</button></td>
            </tr>
        </tbody>
    </table>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>

<script>
    // Funciones para agregar y eliminar filas dinámicamente
    let rowCount = 1;
    
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

    let gerenteCount = 1;
    
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

    let envioCount = 1;
    
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
        </tr>
    </tbody>
</table>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>

<script>
    // Funciones para agregar y eliminar filas dinámicamente
    let rowCount = 1;
    
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

    let gerenteCount = 1;
    
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

    let envioCount = 1;
    
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
        </tr>
    </tbody>
</table>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>

<script>
    // Funciones para agregar y eliminar filas dinámicamente
    let rowCount = 1;
    
    function addRow() {
        let table = document.getElementById("inventario_actual_table").getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="inventario_actual[${rowCount}][proveedor_id]" required></td>
            <td><input type="text" class="form-control" name="inventario_actual[${rowCount}][product_id]" required></td>
<td><input type="number" class="form-control" name="inventario_actual[${rowCount}][cantidad]" required></td>
<td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">Eliminar</button></td>

<script>
    // Función para agregar y eliminar filas dinámicamente en el inventario actual
    let rowCount = 1;
    
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
    let gerenteCount = 1;
    
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

    // Función para agregar y eliminar envíos dinámicamente
    let envioCount = 1;
    
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
        </tr>
    </tbody>
</table>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>

<script>
    // Funciones para agregar y eliminar productos en el historial de envíos
    function addProducto(btn) {
        let table = btn.closest('table').getElementsByTagName('tbody')[0];
        let newRow = table.insertRow();
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="historial_envios[${envioCount}][productos_enviados][${table.rows.length - 1}][product_id]" required></td>
            <td><input type="number" class="form-control" name="historial_envios[${envioCount}][productos_enviados][${table.rows.length - 1}][cantidad]" required></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeProducto(this)">Eliminar</button></td>
        `;
    }
    
    function removeProducto(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Función para eliminar un envío completo
    function removeEnvio(btn) {
        let row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

@endsection

