@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Editar Producto
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('productos.update', $producto->product_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="product_id" style="color:black">ID del Producto</label>
                            <input type="text" name="product_id" class="form-control" id="product_id" value="{{ $producto->product_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre_producto" style="color:black">Nombre del Producto</label>
                            <input type="text" name="nombre_producto" class="form-control" id="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" style="color:black">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" rows="4" required>{{ $producto->descripcion }}</textarea>
                        </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="precio" style="color:black">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio" step="0.01" value="{{ $producto->precio }}" required>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
