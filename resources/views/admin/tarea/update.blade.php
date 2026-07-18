@extends('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Actualizar Tarea</h4>
            <hr>

            <form action="{{ route('Tareas.update', $tarea->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- PROYECTO -->
                <div class="form-group mb-3">
                    <label>Proyecto</label>
                    <select name="proyecto_id" class="form-control">
                        <option value="">Seleccionar proyecto</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}"
                                {{ old('proyecto_id', $tarea->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                                {{ $proyecto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- REQUISITO -->
                <div class="form-group mb-3">
                    <label>Requisito</label>
                    <select name="requisito_id" class="form-control">
                        <option value="">Seleccionar requisito</option>
                        @foreach ($requisitos as $requisito)
                            <option value="{{ $requisito->id }}"
                                {{ old('requisito_id', $tarea->requisito_id) == $requisito->id ? 'selected' : '' }}>
                                {{ $requisito->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- USUARIO -->
                <div class="form-group mb-3">
                    <label>Asignado a</label>
                    <select name="user_id" class="form-control">
                        <option value="">Seleccionar usuario</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $tarea->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('user_id')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- TITULO -->
                <div class="form-group mb-3">
                    <label>Título</label>

                    <input
                        type="text"
                        class="form-control"
                        name="titulo"
                        value="{{ old('titulo', $tarea->titulo) }}">

                    @error('titulo')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- DESCRIPCION -->
                <div class="form-group mb-3">
                    <label>Descripción</label>

                    <textarea
                        class="form-control"
                        name="descripcion"
                        rows="4">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                </div>

                <!-- FECHA VENCIMIENTO -->
                <div class="form-group mb-3">
                    <label>Fecha de vencimiento</label>

                    <input
                        type="datetime-local"
                        class="form-control"
                        name="fecha_vencimiento"
                        value="{{ old('fecha_vencimiento', $tarea->fecha_vencimiento ? \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('Y-m-d\TH:i') : '') }}">

                    @error('fecha_vencimiento')
                        <div class="alert alert-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- PRIORIDAD -->
                <div class="form-group mb-3">
                    <label>Prioridad</label>

                    <select class="form-control" name="prioridad">
                        <option value="baja"
                            {{ old('prioridad', $tarea->prioridad) == 'baja' ? 'selected' : '' }}>
                            Baja
                        </option>

                        <option value="media"
                            {{ old('prioridad', $tarea->prioridad) == 'media' ? 'selected' : '' }}>
                            Media
                        </option>

                        <option value="alta"
                            {{ old('prioridad', $tarea->prioridad) == 'alta' ? 'selected' : '' }}>
                            Alta
                        </option>
                    </select>
                </div>

                <!-- ESTADO -->
                <div class="form-group mb-3">
                    <label>Estado</label>

                    <select class="form-control" name="completada">
                        <option value="0"
                            {{ old('completada', $tarea->completada) == 0 ? 'selected' : '' }}>
                            Pendiente
                        </option>

                        <option value="1"
                            {{ old('completada', $tarea->completada) == 1 ? 'selected' : '' }}>
                            Completada
                        </option>
                    </select>
                </div>

                <!-- BOTONES -->
                <div class="text-end">
                    <a href="{{ route('Tareas.index') }}" class="btn btn-secondary">
                        Volver
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Actualizar Tarea
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection