@extends('layouts.app')

@section('content')
    <h1>{{ isset($proveedor) ? 'Editar Proveedor' : 'Crear Proveedor' }}</h1>
    
    <form action="{{ isset($proveedor) ? route('proveedores.update', $proveedor->_id) : route('proveedores.store') }}" method="POST">
        @csrf
        @if(isset($proveedor))
            @method('PUT')
        @endif

        <div>
            <label for="proveedor_id">ID del Proveedor</label>
            <input type="text" id="proveedor_id" name="proveedor_id" value="{{ old('proveedor_id', $proveedor->proveedor_id ?? '') }}" required>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre ?? '') }}" required>
        </div>

        <div>
            <label for="información_personal[email]">Email</label>
            <input type="email" id="información_personal[email]" name="información_personal[email]" value="{{ old('información_personal.email', $proveedor->información_personal['email'] ?? '') }}" required>
        </div>

        <div>
            <label for="información_personal[telefono]">Teléfono</label>
            <input type="text" id="información_personal[telefono]" name="información_personal[telefono]" value="{{ old('información_personal.telefono', $proveedor->información_personal['telefono'] ?? '') }}" required>
        </div>

        <div>
            <label for="información_personal[dirección]">Dirección</label>
            <input type="text" id="información_personal[dirección]" name="información_personal[dirección]" value="{{ old('información_personal.dirección', $proveedor->información_personal['dirección'] ?? '') }}" required>
        </div>

        <div>
            <label for="productos_suministrados">Productos Suministrados</label>
            <textarea id="productos_suministrados" name="productos_suministrados" required>{{ old('productos_suministrados', json_encode($proveedor->productos_suministrados ?? [], JSON_PRETTY_PRINT)) }}</textarea>
        </div>

        <div>
            <label for="bodegas_suministradas">Bodegas Suministradas</label>
            <textarea id="bodegas_suministradas" name="bodegas_suministradas" required>{{ old('bodegas_suministradas', json_encode($proveedor->bodegas_suministradas ?? [], JSON_PRETTY_PRINT)) }}</textarea>
        </div>

        <div>
            <button type="submit">{{ isset($proveedor) ? 'Actualizar' : 'Crear' }}</button>
        </div>
    </form>
@endsection
