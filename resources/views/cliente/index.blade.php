<!-- resources/views/cliente/index.blade.php -->

<h1>Listado de Clientes</h1>

<a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Crear Cliente</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->email }}</td>
            <td>
                <a href="{{ route('clientes.editar', ['id' => $cliente->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                <form action="{{ route('clientes.eliminar', ['id' => $cliente->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
