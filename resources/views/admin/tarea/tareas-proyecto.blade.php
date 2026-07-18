@extends('layouts.inc.admin')

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4>

                            📁 {{ $proyecto->nombre }}

                        </h4>

                        <small class="text-muted">

                            Tareas del proyecto

                        </small>

                    </div>

                    <div>

                        <a

                        href="{{ route('Tareas.index') }}"

                        class="btn btn-secondary">

                            ← Volver

                        </a>

                    </div>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table

                    id="myTable"

                    class="table table-bordered table-hover display">

                        <thead>

                        <tr>

                            <th>N°</th>

                            <th>ID</th>

                            <th>Requisito</th>

                            <th>Usuario</th>

                            <th>Título</th>

                            <th>Descripción</th>

                            <th>Fecha vencimiento</th>

                            <th>Completada</th>

                            <th>Prioridad</th>

                            <th>Acciones</th>

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

                                {{ $item->requisito?->titulo ?? 'Sin requisito' }}

                            </td>

                            <td>

                                {{ $item->usuario?->name }}

                            </td>

                            <td>

                                {{ $item->titulo }}

                            </td>

                            <td class="text-center">

                                <button

                                type="button"

                                class="btn btn-info btn-sm"

                                data-bs-toggle="modal"

                                data-bs-target="#descripcionModal{{ $item->id }}">

                                    Ver

                                </button>

                                @include('admin.tarea.modal-descripcion')

                            </td>

                            <td>

                                {{ $item->fecha_vencimiento }}

                            </td>

                            <td>

                                @if($item->completada)

                                    <span class="badge bg-success">

                                        Completada

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">

                                        Pendiente

                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($item->prioridad == 'Alta')

                                    <span class="badge bg-danger">

                                        Alta

                                    </span>

                                @elseif($item->prioridad == 'Media')

                                    <span class="badge bg-warning text-dark">

                                        Media

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Baja

                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-grid gap-2">

                                    <a

                                    href="{{ route('Tareas.edit',$item->id) }}"

                                    class="btn btn-outline-secondary">

                                        Editar

                                    </a>

                                    <a

                                    href="{{ route('Tareas.show',$item->id) }}"

                                    class="btn btn-danger">

                                        Eliminar

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="10"

                                class="text-center py-4">

                                No existen tareas.

                            </td>

                        </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection