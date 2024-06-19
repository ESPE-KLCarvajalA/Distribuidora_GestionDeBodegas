@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Distribuidores
                        <a href="{{ route('distribuidores.create') }}" class="btn btn-sm btn-primary float-right">Crear Distribuidor</a>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('type') }}">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Contacto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distribuidores as $distribuidor)
                                    <tr>
                                        <td>{{ $distribuidor->dist_id }}</td>
                                        <td>{{ $distribuidor->nombre }}</td>
                                        <td>{{ $distribuidor->información_contacto['email'] }}</td>
                                        <td>
                                            <a href="{{ route('distribuidores.show', $distribuidor->id) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('distribuidores.edit', $distribuidor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('distribuidores.destroy', $distribuidor->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este distribuidor?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
