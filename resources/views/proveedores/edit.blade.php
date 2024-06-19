@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="proveedor_id">ID del Proveedor</label>
            <input type="text" name="proveedor_id" class="form-control" id="proveedor_id" value="{{ $proveedor->proveedor_id }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $proveedor->nombre }}" required>
        </div>
        <div class="form-group">
            <h4>Información Personal</h4>
            <label for="información_personal.email">Email</label>
            <input type="email" name="información_personal[email]" class="form-control" id="información_personal.email" value="{{ $proveedor->información_personal['email'] }}" required>
            
            <label for="información_personal.telefono">Teléfono</label>
            <input type="text" name="información_personal[telefono]" class="form-control" id="información_personal.telefono" value="{{ $proveedor->información_personal['telefono'] }}" required>
            
            <label for="información_personal.dirección">Dirección</label>
            <input type="text" name="información_personal[dirección]" class="form-control" id="información_personal.dirección" value="{{ $proveedor->información_personal['dirección'] }}" required>
        </div>
        <div class="form-group">
            <h4>Productos Suministrados</h4>
            <div id="productos_suministrados">
                @foreach ($proveedor->productos_suministrados as $index => $producto)
                    <div class="product-group">
                        <label for="productos_suministrados[{{ $index }}][product_id]">ID del Producto</label>
                        <input type="text" name="productos_suministrados[{{ $index }}][product_id]" class="form-control" value="{{ $producto['product_id'] }}" required>
                        
                        <label for="productos_suministrados[{{ $index }}][cantidad]">Cantidad</label>
                        <input type="number" name="productos_suministrados[{{ $index }}][cantidad]" class="form-control" value="{{ $producto['cantidad'] }}" required>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-secondary" onclick="addProduct()">Añadir Producto</button>
        </div>
        <div class="form-group">
            <h4>Bodegas Suministradas</h4>
            <div id="bodegas_suministradas">
                @foreach ($proveedor->bodegas_suministradas as $index => $bodega)
                    <input type="text" name="bodegas_suministradas[{{ $index }}]" class="form-control" value="{{ $bodega }}" required>
                @endforeach
            </div>
            <button type="button" class="btn btn-secondary" onclick="addBodega()">Añadir Bodega</button>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
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
