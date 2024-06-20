@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('productos.update', $producto->product_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="product_id">ID del Producto</label>
                    <input type="text" name="product_id" class="form-control" id="product_id" value="{{ $producto->product_id }}" required>
                </div>

                <div class="form-group">
                    <label for="nombre_producto">Nombre del Producto</label>
                    <input type="text" name="nombre_producto" class="form-control" id="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" rows="4" required>{{ $producto->descripcion }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" class="form-control" id="precio" step="0.01" value="{{ $producto->precio }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>

                <!-- Eliminación del campo proveedor_id -->
                <!-- <div class="form-group">
                    <label for="proveedor_id">Proveedor</label>
                    <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->_id }}" {{ $producto->proveedor_id == $proveedor->_id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div> -->
            </div>
        </form>
    </div>
</div>
@endsection
