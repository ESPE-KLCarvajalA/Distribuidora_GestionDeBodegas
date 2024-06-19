@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Bodega</div>

                <div class="card-body">
                    <form action="{{ route('bodegas.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="Bod_id">ID</label>
                            <input type="text" class="form-control" id="Bod_id" name="Bod_id" value="{{ old('Bod_id') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ubicacion">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="capacidad">Capacidad</label>
                            <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="inventario_actual">Inventario Actual</label>
                            <textarea class="form-control" id="inventario_actual" name="inventario_actual" rows="3">{{ old('inventario_actual') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gerentes">Gerentes</label>
                            <textarea class="form-control" id="gerentes" name="gerentes" rows="3">{{ old('gerentes') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="historial_envios">Historial de Envios</label>
                            <textarea class="form-control" id="historial_envios" name="historial_envios" rows="3">{{ old('historial_envios') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
