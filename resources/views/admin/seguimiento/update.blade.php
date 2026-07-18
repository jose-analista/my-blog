@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Editar Seguimiento</h4>

                {{-- BOTÓN ELIMINAR --}}
                <form action="{{ route('Interaccion.destroy', $interaccion->id) }}" 
                      method="POST"
                      onsubmit="return confirm('¿Deseas eliminar esta interacción?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
            </div>

            <hr>

            <form action="{{ route('Interaccion.update', $interaccion->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- EMPRESA --}}
                <div class="form-group mb-3">
                    <label>Empresa</label>

                    <select name="empresa_id" class="form-control" required>
                        <option value="">Seleccionar empresa</option>

                        @foreach ($empresa as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == $interaccion->empresa_id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>

                    @error('empresa_id')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- RESPONSABLE --}}
                <div class="form-group mb-3">
                    <label>Responsable de la interacción</label>

                    <select name="user_id" class="form-control select2">

                        @foreach ($user as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == $interaccion->user_id ? 'selected' : '' }}>

                                {{ $item->name }}

                                {{ $item->id == auth()->id() ? '(Tú)' : '' }}

                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- TIPO --}}
                <div class="form-group mb-3">
                    <label>Tipo</label>

                    <select class="form-control" name="tipo" required>

                        <option value="llamada"
                            {{ $interaccion->tipo == 'llamada' ? 'selected' : '' }}>
                            Llamada
                        </option>

                        <option value="correo"
                            {{ $interaccion->tipo == 'correo' ? 'selected' : '' }}>
                            Correo
                        </option>

                        <option value="reunion"
                            {{ $interaccion->tipo == 'reunion' ? 'selected' : '' }}>
                            Reunión
                        </option>

                        <option value="mensaje"
                            {{ $interaccion->tipo == 'mensaje' ? 'selected' : '' }}>
                            Mensaje
                        </option>

                    </select>

                    @error('tipo')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- NOTAS --}}
                <div class="form-group mb-3">
                    <label>Notas</label>

                    <textarea class="form-control"
                              name="notas"
                              rows="4"
                              placeholder="Escribe aquí las observaciones...">{{ old('notas', $interaccion->notas) }}</textarea>

                    @error('notas')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- FECHA --}}
                <div class="form-group mb-3">
                    <label>Fecha de la interacción</label>

                    <input type="datetime-local"
                           class="form-control"
                           name="fecha_interaccion"
                           value="{{ old('fecha_interaccion', \Carbon\Carbon::parse($interaccion->fecha_interaccion)->format('Y-m-d\TH:i')) }}">

                    @error('fecha_interaccion')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- BOTONES --}}
                <div class="text-end">
                    <a href="{{ route('Interaccion.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Actualizar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection