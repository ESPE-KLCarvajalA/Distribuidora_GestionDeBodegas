@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Lista de Clientes Finales</span>
                        <a href="{{ route('clientesfinales.create') }}" class="btn btn-sm btn-success">Crear Cliente</a>
                    </div>

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
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientesfinales as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id_cliente }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>
                                            <a href="{{ route('clientesfinales.edit', $cliente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('clientesfinales.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No hay clientes finales registrados.</td>
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
