@extends ('layouts.inc.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Servicios
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <a href="{{ route('Servicios.create') }}" class="btn btn-primary float-end">
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
                                <th class="text-white">Nombre</th>
                                <th class="text-white">Categoria</th>
                                <th class="text-white">Modelo de cobro</th>
                                <th class="text-white">Tarifa base</th>
                                <th class="text-white">Moneda</th>
                                <th class="text-white">Estado</th>
                                <th class="text-white">exclusiones</th>
                                <th class="text-white">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
    $contandor = 1;
                                          ?>
                                @forelse ($servicios as $item)
                                                            <tr>
                                                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                <td><?php    echo $contandor?></td>
                                                                <td>{{ $item->id }}</td>

                                                                <td>{{ $item->nombre }}</td>
                                                                <td>{{ $item->categoria }}</td>
                                                                <td>{{ $item->modelo_cobro }}</td>
                                                                <td>{{ $item->tarifa_base }}</td>
                                                                <td>{{ $item->moneda }}</td>
                                                                <td>{{ $item->estado }}</td>
                                                                <td>                                                         <button
        type="button"
        class="btn btn-info btn-sm mt-2 text-light"
        data-bs-toggle="modal"
        data-bs-target="#observacionModalservicio{{ $item->id }}"
    >
        Ver
    </button>

   @include('admin.servicio.modal_observaciones')
</td>
                                                                <td>
                                                                    <div class="d-grid gap-2">
                                                                        <a class="btn btn-outline-secondary"
                                                                            href="{{ route('Servicios.edit', $item->id) }}" role="button">Editar</a>
                                                                        <a class="btn btn-danger" href="{{ route('Servicios.show', $item->id) }}"
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