<!-- resources/views/productos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto->product_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_producto">Nombre de Producto</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="any" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
            </div>
            <div class="form-group">
                <label for="proveedor_id">Proveedor</label>
                <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->_id }}" {{ $proveedor->_id == $producto->proveedor_id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
