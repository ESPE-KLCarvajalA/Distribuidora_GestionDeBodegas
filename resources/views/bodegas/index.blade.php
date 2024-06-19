@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <h2>Lista de Bodegas</h2>
                    <a href="{{ route('bodegas.create') }}" class="btn btn-success">Crear Bodega</a>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type', 'info') }}">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ubicación</th>
                                    <th>Capacidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bodegas as $bodega)
                                    <tr>
                                        <td>{{ $bodega->Bod_id }}</td>
                                        <td>{{ $bodega->ubicacion }}</td>
                                        <td>{{ $bodega->capacidad }}</td>
                                        <td>
                                            <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta bodega?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hay bodegas registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
