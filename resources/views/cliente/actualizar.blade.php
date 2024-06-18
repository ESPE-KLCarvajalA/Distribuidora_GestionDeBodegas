<!-- resources/views/cliente/editar.blade.php -->

<form action="{{ route('clientes.update', ['id' => $cliente->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Campos de edición -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}">
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}">

    <!-- Otros campos -->

    <button type="submit">Actualizar Cliente</button>
</form>
