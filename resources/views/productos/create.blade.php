@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">ID del Producto</label>
                <input type="text" name="product_id" class="form-control" id="product_id" required>
            </div>
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto</label>
                <input type="text" name="nombre_producto" class="form-control" id="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" class="form-control" id="precio" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>
@endsection
