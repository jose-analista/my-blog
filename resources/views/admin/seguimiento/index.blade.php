@extends ('layouts.inc.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Seguimiento
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <a href="{{ route('Interaccion.create') }}" class="btn btn-primary float-end">
                        <img src="{{asset('img/icon/add.svg')}}" alt="" width="25px" height="25px">

                        Agregar
                    </a>

                    </br>
                    </br>
                    <div class="table table-reposive">
                        <style>
                            #myTable td,
                            #myTable th {
                                padding: 12px;
                            }
                        </style>
                        <table class="table table-bordered display" id="myTable">
                            <thead>
                                <th class="text-white">N.</th>
                                <th class="text-white">ID</th>
                                <th class="text-white">Empresa</th>
                                <th class="text-white">Usuario</th>
                                <th class="text-white">Tipo</th>
                                <th class="text-white">Notas</th>
                                <th class="text-white">Fecha</th>
                                <th class="text-white">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
    $contandor = 1;
                                          ?>
                                @forelse ($interacciones as $item)
                                                            <tr>
                                                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                <td><?php    echo $contandor?></td>
                                                                <td>{{ $item->id }}</td>
                                                                <td>{{ $item->empresa->nombre ?? 'Sin empresa' }}</td>
                                                                <td>{{ $item->user->name ?? 'Sin usuario' }}</td>
                                                                <td>{{ $item->tipo }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                                                        data-bs-target="#modalNotas{{ $item->id }}">
                                                                        Ver Notas
                                                                    </button>

                                                                    <div class="modal fade" id="modalNotas{{ $item->id }}" tabindex="-1"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Notas de la Interacción</h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    {{ $item->notas }}
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $item->fecha_interaccion }}</td>

                                                                <td>
                                                                    <div class="d-grid gap-2">
                                                                        <a class="btn btn-outline-secondary"
                                                                            href="{{ route('Interaccion.edit', $item->id) }}" role="button">Editar</a>
                                                                        <a class="btn btn-danger" href="{{ route('Interaccion.show', $item->id) }}"
                                                                            role="button">Eliminar</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                    $contandor++;
                                                                                                  ?>
                                @empty
                                    <!--
                                            <tr>
                                                <div>
                                                    <h1>No hay productos</h1>
                                                </div>
                                            </tr>
                                              -->
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection