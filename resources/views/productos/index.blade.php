<!-- resources/views/productos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>
        
        @if (session('message'))
            <div class="alert alert-{{ session('type', 'info') }}">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
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
                    <td>{{ $producto->proveedor ? $producto->proveedor->nombre : 'Sin proveedor' }}</td>   
                    <td>
                        <a href="{{ route('productos.show', $producto->product_id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('productos.edit', $producto->product_id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->product_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
    </div>
@endsection
