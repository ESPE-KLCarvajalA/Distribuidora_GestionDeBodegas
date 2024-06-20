@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente Final</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('clientesfinales.update', $clientefinal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_cliente">ID Cliente</label>
            <input type="text" name="id_cliente" class="form-control" value="{{ old('id_cliente', $clientefinal->id_cliente) }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $clientefinal->nombre) }}" required>
        </div>
        <div class="form-group">
            <label for="informacion_contacto[email]">Email</label>
            <input type="email" name="informacion_contacto[email]" class="form-control" value="{{ old('informacion_contacto.email', $clientefinal->informacion_contacto['email']) }}" required>
        </div>
        <div class="form-group">
            <label for="informacion_contacto[telefono]">Teléfono</label>
            <input type="text" name="informacion_contacto[telefono]" class="form-control" value="{{ old('informacion_contacto.telefono', $clientefinal->informacion_contacto['telefono']) }}" required>
        </div>
        <div class="form-group">
            <label for="informacion_contacto[direccion]">Dirección</label>
            <input type="text" name="informacion_contacto[direccion]" class="form-control" value="{{ old('informacion_contacto.direccion', $clientefinal->informacion_contacto['direccion']) }}" required>
        </div>
        <div class="form-group">
            <label for="historial_compras">Historial de Compras</label>
            <div id="historial_compras">
                @foreach ($clientefinal->historial_compras as $index => $compra)
                    <div class="historial_compra">
                        <label for="historial_compras[{{ $index }}][product_id]">Producto</label>
                        <select name="historial_compras[{{ $index }}][product_id]" class="form-control" required>
                            <option value="">Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" {{ $compra['product_id'] == $producto->id ? 'selected' : '' }}>{{ $producto->nombre_producto }}</option>
                            @endforeach
                        </select>
                        <label for="historial_compras[{{ $index }}][cantidad]">Cantidad</label>
                        <input type="number" name="historial_compras[{{ $index }}][cantidad]" class="form-control" value="{{ old('historial_compras.' . $index . '.cantidad', $compra['cantidad']) }}" required>
                        <label for="historial_compras[{{ $index }}][fecha_compra]">Fecha de Compra</label>
                        <input type="date" name="historial_compras[{{ $index }}][fecha_compra]" class="form-control" value="{{ old('historial_compras.' . $index . '.fecha_compra', $compra['fecha_compra']) }}" required>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-secondary" onclick="addCompra()">Agregar Compra</button>
        </div>
        <div class="form-group">
            <label for="preferencias">Preferencias</label>
            @foreach ($clientefinal->preferencias as $index => $preferencia)
                <input type="text" name="preferencias[]" class="form-control" value="{{ old('preferencias.' . $index, $preferencia) }}" required>
            @endforeach
            <button type="button" class="btn btn-secondary" onclick="addPreferencia()">Agregar Preferencia</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
    let compraIndex = {{ count($clientefinal->historial_compras) }};

    function addCompra() {
        const historialComprasDiv = document.getElementById('historial_compras');
        const newCompraDiv = document.createElement('div');
        newCompraDiv.classList.add('historial_compra');
        newCompraDiv.innerHTML = `
            <label for="historial_compras[${compraIndex}][product_id]">Producto</label>
            <select name="historial_compras[${compraIndex}][product_id]" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                @endforeach
            </select>
            <label for="historial_compras[${compraIndex}][cantidad]">Cantidad</label>
            <input type="number" name="historial_compras[${compraIndex}][cantidad]" class="form-control" required>
            <label for="historial_compras[${compraIndex}][fecha_compra]">Fecha de Compra</label>
            <input type="date" name="historial_compras[${compraIndex}][fecha_compra]" class="form-control" required>
        `;
        historialComprasDiv.appendChild(newCompraDiv);
        compraIndex++;
    }

    function addPreferencia() {
        const preferenciasDiv = document.querySelector('.form-group:last-of-type');
        const newPreferenciaInput = document.createElement('input');
        newPreferenciaInput.type = 'text';
        newPreferenciaInput.name = 'preferencias[]';
        newPreferenciaInput.classList.add('form-control');
        newPreferenciaInput.required = true;
        preferenciasDiv.insertBefore(newPreferenciaInput, preferenciasDiv.querySelector('button'));
    }
</script>
@endsection
