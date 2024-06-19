@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Proveedor</h1>

    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="proveedor_id">ID del Proveedor</label>
            <input type="text" name="proveedor_id" class="form-control" id="proveedor_id" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="form-group">
            <h4>Información Personal</h4>
            <label for="información_personal.email">Email</label>
            <input type="email" name="información_personal[email]" class="form-control" id="información_personal.email" required>
            
            <label for="información_personal.telefono">Teléfono</label>
            <input type="text" name="información_personal[telefono]" class="form-control" id="información_personal.telefono" required>
            
            <label for="información_personal.dirección">Dirección</label>
            <input type="text" name="información_personal[dirección]" class="form-control" id="información_personal.dirección" required>
        </div>
        <div class="form-group">
            <h4>Productos Suministrados</h4>
            <div id="productos_suministrados">
                <div class="product-group">
                    <label for="productos_suministrados[0][product_id]">ID del Producto</label>
                    <input type="text" name="productos_suministrados[0][product_id]" class="form-control" required>
                    
                    <label for="productos_suministrados[0][cantidad]">Cantidad</label>
                    <input type="number" name="productos_suministrados[0][cantidad]" class="form-control" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addProduct()">Añadir Producto</button>
        </div>
        <div class="form-group">
            <h4>Bodegas Suministradas</h4>
            <div id="bodegas_suministradas">
                <input type="text" name="bodegas_suministradas[0]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addBodega()">Añadir Bodega</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
    </form>
</div>

<script>
function addProduct() {
    const index = document.querySelectorAll('.product-group').length;
    const newProductGroup = `
        <div class="product-group">
            <label for="productos_suministrados[${index}][product_id]">ID del Producto</label>
            <input type="text" name="productos_suministrados[${index}][product_id]" class="form-control" required>
            
            <label for="productos_suministrados[${index}][cantidad]">Cantidad</label>
            <input type="number" name="productos_suministrados[${index}][cantidad]" class="form-control" required>
        </div>
    `;
    document.getElementById('productos_suministrados').insertAdjacentHTML('beforeend', newProductGroup);
}

function addBodega() {
    const index = document.querySelectorAll('#bodegas_suministradas input').length;
    const newBodega = `<input type="text" name="bodegas_suministradas[${index}]" class="form-control" required>`;
    document.getElementById('bodegas_suministradas').insertAdjacentHTML('beforeend', newBodega);
}
</script>
@endsection
