@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar Tarea</h4>
            <hr>

            <form action="{{ route('Tareas.store') }}" method="post">
                @csrf

                <!-- proyecto -->
                @include('layouts.componente.buscarproyecto')

                  <!-- requisito -->
                @include('layouts.componente.buscar-requisito')

                <!-- USUARIO -->
                <div class="form-group mb-3">
                    <label>Asignado a</label>
                    <select name="user_id" class="form-control">
                        <option value="">Seleccionar usuario</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="alert alert-danger mt-1">Campo requerido</div>
                    @enderror
                </div>

                <!-- TITULO -->
                <div class="form-group mb-3">
                    <label>Título</label>
                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">
                    @error('titulo')
                        <div class="alert alert-danger mt-1">Campo requerido</div>
                    @enderror
                </div>

                <!-- DESCRIPCIÓN -->
                <div class="form-group mb-3">
                    <label>Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                </div>

                <!-- FECHA VENCIMIENTO -->
                <div class="form-group mb-3">
                    <label>Fecha de vencimiento</label>
                    <input type="datetime-local" class="form-control" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}">
                    @error('fecha_vencimiento')
                        <div class="alert alert-danger mt-1">Campo requerido</div>
                    @enderror
                </div>

                <!-- PRIORIDAD -->
                <div class="form-group mb-3">
                    <label>Prioridad</label>
                    <select class="form-control" name="prioridad">
                        <option value="baja" {{ old('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                        <option value="media" {{ old('prioridad') == 'media' ? 'selected' : '' }}>Media</option>
                        <option value="alta" {{ old('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <!-- COMPLETADA -->
                <div class="form-group mb-3">
                    <label>Estado</label>
                    <select class="form-control" name="completada">
                        <option value="0">Pendiente</option>
                        <option value="1">Completada</option>
                    </select>
                </div>

                <!-- BOTÓN -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection