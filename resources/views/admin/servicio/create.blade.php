@extends ('layouts.inc.admin')

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agregar Nuevo Servicio</h4>
                <hr>

                <form action="{{ route('Servicios.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <!-- NOMBRE -->
                        <div class="col-md-6 form-group mb-3">
                            <label>Nombre del Servicio</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required placeholder="Ej: Consultoría TI">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CATEGORÍA -->
                        <div class="col-md-6 form-group mb-3">
                            <label>Categoría</label>
                            <input type="text" class="form-control" name="categoria" value="{{ old('categoria') }}" required placeholder="Ej: Soporte">
                            @error('categoria')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- MODELO DE COBRO -->
                        <div class="col-md-4 form-group mb-3">
                            <label>Modelo de Cobro</label>
                            <select class="form-control" name="modelo_cobro" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="Mensual" {{ old('modelo_cobro') == 'Mensual' ? 'selected' : '' }}>Mensual</option>
                                <option value="Por Hora" {{ old('modelo_cobro') == 'Por Hora' ? 'selected' : '' }}>Por Hora</option>
                                <option value="Precio Fijo" {{ old('modelo_cobro') == 'Precio Fijo' ? 'selected' : '' }}>Precio Fijo</option>
                            </select>
                            @error('modelo_cobro')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- TARIFA BASE -->
                        <div class="col-md-4 form-group mb-3">
                            <label>Tarifa Base</label>
                            <input type="number" step="0.01" class="form-control" name="tarifa_base" value="{{ old('tarifa_base') }}" required placeholder="0.00">
                            @error('tarifa_base')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- MONEDA -->
                        <div class="col-md-4 form-group mb-3">
                            <label>Moneda</label>
                            <input type="text" class="form-control" name="moneda" value="{{ old('moneda', 'CLP') }}" maxlength="3" required>
                            @error('moneda')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ESTADO -->
                    <div class="form-group mb-3">
                        <label>Estado</label>
                        <select class="form-control" name="estado">
                            <option value="activo" {{ old('estado', 'activo') == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EXCLUSIONES (TEXT) -->
                    <div class="form-group mb-3">
                        <label>Exclusiones / Observaciones</label>
                        <textarea class="form-control" name="exclusiones" rows="4"
                            placeholder="Detalle aquí lo que no incluye el servicio o notas adicionales...">{{ old('exclusiones') }}</textarea>
                        @error('exclusiones')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- BOTONES -->
                    <div class="text-end">
                        <a href="{{ route('Servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Servicio</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection