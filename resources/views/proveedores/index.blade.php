@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 style="color: black;">Listado de Proveedores</h1>
            <a href="{{ route('proveedores.create') }}" class="btn btn-success">Crear Nuevo Proveedor</a>
        </div>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Formulario de búsqueda -->
        <form action="{{ route('proveedores.index') }}" method="GET" class="mb-4 mt-3">
            <div class="row">
            <div class="col-6 input-group mb-2">
                <input type="text" name="search_name" class="form-control" placeholder="Buscar por nombre de proveedor" value="{{ request('search_name') }}">
            </div>
            <div class="col-6 input-group mb-2">
                <input type="text" name="search_id" class="form-control" placeholder="Buscar por ID de proveedor" value="{{ request('search_id') }}">
            </div>
            </div>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
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
                                <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-info">Editar</a>
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
