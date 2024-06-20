@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Lista de Clientes</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type', 'info') }}" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <a href="{{ route('clientesfinales.create') }}" class="btn btn-primary justify-content-end">Crear Cliente</a>
                        </div>

                        <table class="table table-bordered">
                        <thead class="table-dark">
                                <tr>
                                    <th>ID Cliente</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientesfinales as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id_cliente }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->informacion_contacto['email'] }}</td>
                                        <td>{{ $cliente->informacion_contacto['telefono'] }}</td>
                                        <td>{{ $cliente->informacion_contacto['direccion'] }}</td>
                                        <td>
                                            <a href="{{ route('clientesfinales.show', $cliente->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                            <a href="{{ route('clientesfinales.edit', $cliente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('clientesfinales.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este cliente final?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No hay clientes finales registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style="color:black">Lista de Clientes Finales</h1>
            <a href="{{ route('clientesfinales.create') }}" class="btn btn-success">Crear Cliente Final</a>
        </div>

        @if (session('message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID Cliente</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientesfinales as $cliente)
                        <tr>
                            <td>{{ $cliente->id_cliente }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->informacion_contacto['email'] }}</td>
                            <td>{{ $cliente->informacion_contacto['telefono'] }}</td>
                            <td>{{ $cliente->informacion_contacto['direccion'] }}</td>
                            <td>
                                <a href="{{ route('clientesfinales.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('clientesfinales.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('clientesfinales.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este cliente final?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay clientes finales registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
