@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style="color:black">Listado de Productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
        </div>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Formulario de búsqueda -->
        <form action="{{ route('productos.index') }}" method="GET" class="mb-4">
            <div class="input-group mb-2">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre de producto" value="{{ request('search') }}">
            </div>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->product_id }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>
                                <a href="{{ route('productos.show', $producto->product_id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('productos.edit', $producto->product_id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->product_id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
