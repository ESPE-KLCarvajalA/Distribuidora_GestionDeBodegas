@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Proveedores</h1>
    
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Crear Nuevo Proveedor</a>

    @if ($proveedores->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay proveedores registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
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
                                <a href="{{ route('proveedores.show', $proveedor->proveedor_id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('proveedores.edit', $proveedor->proveedor_id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('proveedores.destroy', $proveedor->proveedor_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este proveedor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
