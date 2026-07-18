@extends('layouts.inc.admin')

@section('content')

    <style>
        body {
            background: #f4f6f9;
        }

        .dashboard-card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
            transition: .25s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
        }

        .numero {
            font-size: 42px;
            font-weight: 700;
        }

        .card-resumen {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
        }

        .card-header-custom {
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            padding: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: #0d6efd;
            color: #fff;
        }

        .table thead th {
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .badge-prioridad {
            font-size: 13px;
            border-radius: 30px;
            padding: 8px 12px;
        }

        .btn-accion {
            width: 42px;
            height: 42px;
        }

        .fecha-vencida {
            color: #dc3545;
            font-weight: bold;
        }

        .fecha-proxima {
            color: #fd7e14;
            font-weight: bold;
        }

        .fecha-normal {
            color: #198754;
            font-weight: bold;
        }
    </style>



    {{-- RESUMEN GENERAL --}}

    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card card-resumen">

                <div class="card-body text-center">

                    <h6>Total tareas</h6>

                    <h1>

                        {{ $tareas->count() }}

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-resumen">

                <div class="card-body text-center">

                    <h6>Completadas</h6>

                    <h1>

                        {{ $tareas->where('completada', 1)->count() }}

                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-resumen">

                <div class="card-body text-center">

                    <h6>Pendientes</h6>

                    <h1>

                        {{ $tareas->where('completada', 0)->count() }}

                    </h1>

                </div>

            </div>

        </div>

    </div>



    {{-- PROYECTOS --}}

    <div class="row mb-4">

        @foreach($proyectos as $proyecto)

            <div class="col-md-4 col-lg-3 mb-3">

                <div class="card dashboard-card h-100">

                    <div class="card-body text-center">

                        <div style="font-size:35px">

                            📁

                        </div>

                        <h5>

                            {{ $proyecto->nombre }}

                        </h5>

                        <div class="numero text-primary">

                            {{ $proyecto->tareas_count }}

                        </div>

                        <p class="text-muted">

                            Tareas registradas

                        </p>

                        <div class="d-grid">

                            <a href="{{ route('Tareas.proyecto', $proyecto->id) }}" class="btn btn-primary">

                                📋 Ver tareas

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>


    {{-- TABLA --}}

    <div class="card border-0 shadow-sm">

        <div class="card-header-custom">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="mb-0 fs-2 fw-bold">

                        📋 Gestión de tareas

                    </h3>

                    <small class="text-muted">

                        Administra todas las tareas del sistema

                    </small>

                </div>

                <a href="{{ route('Tareas.create') }}" class="btn btn-primary btn-agregar">

                    {{-- <img src="{{ asset('img/icon/add.svg') }}" width="18" class="me-2"> --}}

                    Nueva tarea

                </a>

            </div>

        </div>



        <div class="card-body">

            <div class="table-responsive">

                <table id="myTable" class="table table-hover display">

                    <thead>

                        <tr>

                            <th class="text-white bg-primary">N°</th>

                            <th class="text-white bg-primary">ID</th>

                            <th class="text-white bg-primary">Proyecto</th>

                            <th class="text-white bg-primary">Requisito</th>

                            <th class="text-white bg-primary">Usuario</th>

                            <th class="text-white bg-primary">Título</th>

                            <th class="text-white bg-primary">Descripción</th>

                            <th class="text-white bg-primary">Vencimiento</th>

                            <th class="text-white bg-primary">Estado</th>

                            <th class="text-white bg-primary">Prioridad</th>

                            <th class="text-white bg-primary">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($tareas as $item)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    {{ $item->id }}

                                </td>

                                <td>

                                    {{ $item->proyecto?->nombre ?? 'Sin proyecto' }}

                                </td>

                                <td>

                                    {{ $item->requisito?->titulo ?? 'Sin requisito' }}

                                </td>

                                <td>

                                    {{ $item->usuario?->name }}

                                </td>

                                <td>

                                    {{ $item->titulo }}

                                </td>



                                <td class="text-center">

                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#descripcionModal{{ $item->id }}">

                                        Ver

                                    </button>

                                    @include('admin.tarea.modal-descripcion')

                                </td>



                                <td>

                                    @php

                                        $dias = now()->diffInDays($item->fecha_vencimiento, false);

                                    @endphp

                                    @if($dias < 0)

                                        <span class="fecha-vencida">

                                            ⚠️ Vencida

                                        </span>

                                    @elseif($dias <= 3)

                                        <span class="fecha-proxima">

                                            🟠 {{ $item->fecha_vencimiento }}

                                        </span>

                                    @else

                                        <span class="fecha-normal">

                                            🟢 {{ $item->fecha_vencimiento }}

                                        </span>

                                    @endif

                                </td>



                                <td>

                                    <form action="{{ route('Tareas.completar', $item->id) }}" method="POST">

                                        @csrf

                                        @method('PUT')

                                        <div class="form-check form-switch d-flex align-items-center">

                                            <input class="form-check-input me-2" type="checkbox" name="completada"
                                                onchange="this.form.submit()" {{ $item->completada ? 'checked' : '' }}>

                                            @if($item->completada)

                                                <span class="text-success fw-bold">

                                                    Completada

                                                </span>

                                            @else

                                                <span class="text-warning fw-bold">

                                                    Pendiente

                                                </span>

                                            @endif

                                        </div>

                                    </form>

                                </td>



                                <td>

                                    @if($item->prioridad == 'Alta')

                                        <span class="badge bg-danger badge-prioridad">

                                            🔴 Alta

                                        </span>

                                    @elseif($item->prioridad == 'Media')

                                        <span class="badge bg-warning text-dark badge-prioridad">

                                            🟡 Media

                                        </span>

                                    @else

                                        <span class="badge bg-success badge-prioridad">

                                            🟢 Baja

                                        </span>

                                    @endif

                                </td>



                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('Tareas.edit', $item->id) }}"
                                            class="btn btn-outline-primary btn-sm btn-accion">

                                            ✏️

                                        </a>

                                        <a href="{{ route('Tareas.show', $item->id) }}"
                                            class="btn btn-outline-danger btn-sm btn-accion">

                                            🗑️

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="11" class="text-center py-5">

                                    No existen tareas registradas

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection