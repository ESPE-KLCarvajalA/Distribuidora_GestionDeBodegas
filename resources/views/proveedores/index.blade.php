<!-- resources/views/proveedores/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Proveedores</h1>

        <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Crear Nuevo Proveedor</a>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID del Proveedor</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->proveedor_id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
