@extends('layouts.inc.admin')

@section('content')

    @include('admin.requisitos.modal.modaleditarrequisito')
    @include('admin.requisitos.modal.modaleliminarrequisito')

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">
                    {{ $proyecto->nombre }}
                </h3>

                <small>
                    Empresa:
                    {{ $proyecto->empresa->nombre }}
                </small>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover" id="myTable">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Horas</th>
                            <th>Costo</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th width="120">Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($proyecto->requisitos as $requisito)

                            <tr>
                                <td>{{ $requisito->id }}</td>

                                <td>{{ $requisito->titulo }}</td>

                                <td>{{ $requisito->horas_estimadas }}</td>

                                <td>
                                    ${{ number_format($requisito->costo_estimado, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $requisito->prioridad }}
                                </td>

                                <td>
                                    {{ $requisito->estado }}
                                </td>

                                <td>

                                    <button class="btn btn-warning btn-sm btnEditar" data-id="{{ $requisito->id }}"
                                        data-proyecto="{{ $requisito->proyecto_id }}" data-titulo="{{ $requisito->titulo }}"
                                        data-descripcion="{{ $requisito->descripcion }}"
                                        data-horas="{{ $requisito->horas_estimadas }}" data-valor="{{ $requisito->valor_hora }}"
                                        data-prioridad="{{ $requisito->prioridad }}" data-estado="{{ $requisito->estado }}"
                                        data-bs-toggle="modal" data-bs-target="#editrequisito">

                                        <i class="fa fa-edit"></i>

                                    </button>

                                    <button class="btn btn-danger btn-sm btnEliminar" data-id="{{ $requisito->id }}"
                                        data-titulo="{{ $requisito->titulo }}" data-bs-toggle="modal"
                                        data-bs-target="#deleterequisito">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    No existen requisitos registrados

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.btnEditar').forEach(btn => {

                btn.addEventListener('click', function () {

                    document.getElementById('formEditar').action =
                        "{{ route('Requisito.update', ':id') }}"
                            .replace(':id', this.dataset.id);

                    document.getElementById('edit_proyecto_id').value =
                        this.dataset.proyecto;

                    document.getElementById('edit_titulo').value =
                        this.dataset.titulo;

                    document.getElementById('edit_descripcion').value =
                        this.dataset.descripcion;

                    document.getElementById('edit_horas').value =
                        this.dataset.horas;

                    document.getElementById('edit_valor').value =
                        this.dataset.valor;

                    document.getElementById('edit_prioridad').value =
                        this.dataset.prioridad;

                    document.getElementById('edit_estado').value =
                        this.dataset.estado;

                    let horas = parseFloat(this.dataset.horas) || 0;
                    let valor = parseFloat(this.dataset.valor) || 0;

                    document.getElementById('edit_costo').value =
                        horas * valor;

                });

            });

            document.querySelectorAll('.btnEliminar').forEach(btn => {

                btn.addEventListener('click', function () {

                    document.getElementById('nombreRequisito').innerHTML =
                        this.dataset.titulo;

                    document.getElementById('formEliminar').action =
                        "{{ route('Requisito.destroy', ':id') }}"
                            .replace(':id', this.dataset.id);

                });

            });

        });

    </script>

@endsection