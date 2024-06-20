@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
        <h1 style="color:black">Listado de Proveedores</h1>
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear Nuevo Proveedor</a>
        </div>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead class="table-dark">
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
    </div>
@endsection
