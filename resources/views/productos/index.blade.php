@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>

        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID del Producto</th>
                    <th>Nombre del Producto</th>
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
                     <td>{{ optional($producto->proveedor)->nombre }}</td> 
                        <td>
                            <a href="{{ route('productos.show', $producto->product_id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('productos.edit', $producto->product_id) }}" class="btn btn-primary btn-sm">Editar</a>
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
@endsection
