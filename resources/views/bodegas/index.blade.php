<!-- resources/views/bodegas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h2>Listado de Bodegas</h2>
        <div class="mb-4 d-flex justify-content-end">
            <a href="{{ route('bodegas.create') }}" class="btn btn-primary">Crear Bodega</a>
        </div>
        @if (session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive">

        <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                    <th>ID de Bodega</th>
                    <th>Ubicación</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bodegas as $bodega)
                    <tr>
                        <td>{{ $bodega->Bod_id }}</td>
                        <td>{{ $bodega->ubicacion }}</td>
                        <td>{{ $bodega->capacidad }}</td>
                        <td>
                            <a href="{{ route('bodegas.show', $bodega->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta bodega?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
