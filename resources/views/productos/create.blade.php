@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary txt-white">Crear Nuevo Producto</div>

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

                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="product_id" class="txt-black">ID del Producto</label>
                            <input type="text" name="product_id" class="form-control" id="product_id" value="{{ old('product_id') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_producto" class="txt-black">Nombre del Producto</label>
                            <input type="text" name="nombre_producto" class="form-control" id="nombre_producto" value="{{ old('nombre_producto') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="txt-black">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio" class="txt-black">Precio</label>
                            <input type="number" name="precio" class="form-control" id="precio" step="0.01" value="{{ old('precio') }}" required>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block">Guardar Producto</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('productos.index') }}" class="btn btn-secondary btn-block">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .txt-black {
        color: black; /* Aplica color negro al texto */
        font-weight: bold; /* Opcional: Aplica negrita */
    }
</style>

@endsection
