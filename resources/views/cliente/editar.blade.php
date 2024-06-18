<!-- resources/views/cliente/editar.blade.php -->

<form action="{{ route('usuarios.update', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT') <!-- Método para enviar el formulario como PUT -->

    <!-- Aquí van los campos para editar -->
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}">
    
    <!-- Otros campos -->

    <button type="submit">Actualizar</button>
</form>
