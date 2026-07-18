@extends ('layouts.inc.admin')

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Servicio: {{ $servicio->nombre }}</h4>
                <hr>

                <form action="{{ route('Servicios.update', $servicio->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Crucial para que Laravel reconozca la actualización -->

                    <div class="row">
                        <!-- NOMBRE -->
                        <div class="col-md-6 form-group mb-3">
                            <label>Nombre del Servicio</label>
                            <input type="text" class="form-control" name="nombre" 
                                value="{{ old('nombre', $servicio->nombre) }}" required>
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CATEGORÍA -->
                        <div class="col-md-6 form-group mb-3">
                            <label>Categoría</label>
                            <input type="text" class="form-control" name="categoria" 
                                value="{{ old('categoria', $servicio->categoria) }}" required>
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
                                @php $modelo = old('modelo_cobro', $servicio->modelo_cobro); @endphp
                                <option value="Mensual" {{ $modelo == 'Mensual' ? 'selected' : '' }}>Mensual</option>
                                <option value="Por Hora" {{ $modelo == 'Por Hora' ? 'selected' : '' }}>Por Hora</option>
                                <option value="Precio Fijo" {{ $modelo == 'Precio Fijo' ? 'selected' : '' }}>Precio Fijo</option>
                            </select>
                            @error('modelo_cobro')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- TARIFA BASE -->
                        <div class="col-md-4 form-group mb-3">
                            <label>Tarifa Base</label>
                            <input type="number" step="0.01" class="form-control" name="tarifa_base" 
                                value="{{ old('tarifa_base', $servicio->tarifa_base) }}" required>
                            @error('tarifa_base')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- MONEDA -->
                        <div class="col-md-4 form-group mb-3">
                            <label>Moneda</label>
                            <input type="text" class="form-control" name="moneda" 
                                value="{{ old('moneda', $servicio->moneda) }}" maxlength="3" required>
                            @error('moneda')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ESTADO -->
                    <div class="form-group mb-3">
                        <label>Estado</label>
                        <select class="form-control" name="estado">
                            @php $estado = old('estado', $servicio->estado); @endphp
                            <option value="activo" {{ $estado == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EXCLUSIONES -->
                    <div class="form-group mb-3">
                        <label>Exclusiones / Observaciones</label>
                        <textarea class="form-control" name="exclusiones" rows="4">{{ old('exclusiones', $servicio->exclusiones) }}</textarea>
                        @error('exclusiones')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- BOTONES -->
                    <div class="text-end">
                        <a href="{{ route('Servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection