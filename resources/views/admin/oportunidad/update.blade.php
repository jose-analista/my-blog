@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Oportunidad</h4>
            <hr>

            <form action="{{ route('Oportunidad.update', $oportunidad->id) }}" method="post">
                @csrf
                @method('PUT') {{-- Indispensable para actualizar --}}

                <div class="form-group mb-3">
                    <label for="empresa_id">Empresa</label>
                    <select name="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror">
                        <option value="">Seleccionar empresa</option>
                        @foreach ($empresa as $item)
                            {{-- Lógica para seleccionar la empresa actual --}}
                            <option value="{{ $item->id }}" {{ old('empresa_id', $oportunidad->empresa_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('empresa_id')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $oportunidad->titulo) }}">
                    @error('titulo')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Valor estimado</label>
                    <input type="text" class="form-control @error('valor_estimado') is-invalid @enderror" name="valor_estimado" value="{{ old('valor_estimado', $oportunidad->valor_estimado) }}">
                    @error('valor_estimado')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Etapa</label>
                    <select class="form-control @error('etapa') is-invalid @enderror" name="etapa">
                        <option value="" disabled>Seleccione una opción</option>
                        @foreach(['prospeccion', 'propuesta', 'negociacion', 'ganada', 'perdida'] as $opcion)
                            <option value="{{ $opcion }}" {{ old('etapa', $oportunidad->etapa) == $opcion ? 'selected' : '' }}>
                                {{ ucfirst($opcion) }}
                            </option>
                        @endforeach
                    </select>
                    @error('etapa')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Fecha de cierre estimada</label>
                    <input type="date" class="form-control @error('fecha_cierre_estimada') is-invalid @enderror" name="fecha_cierre_estimada" value="{{ old('fecha_cierre_estimada', $oportunidad->fecha_cierre_estimada) }}">
                    @error('fecha_cierre_estimada')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Descripción</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3">{{ old('descripcion', $oportunidad->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">Campo requerido</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('Oportunidad.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection