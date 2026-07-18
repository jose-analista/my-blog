@extends ('layouts.inc.admin')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Oportunidades
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <a href="{{ route('Oportunidad.create') }}" class="btn btn-primary float-end">
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
                                <th class="text-white">Título</th>
                                <th class="text-white">Valor estimado</th>
                                <th class="text-white">Etapa</th>
                                <th class="text-white">Fecha de cierre estimada</th>
                                <th class="text-white">Descripción</th>
                                <th class="text-white">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
    $contandor = 1;
                                      ?>
                                @forelse ($oportunidades as $item)
                                                            <tr>
                                                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                <td><?php    echo $contandor?></td>
                                                                <td>{{ $item->id }}</td>
                                                                
                                                                <td>{{ $item->empresa->nombre }}</td>
                                                                <td>{{ $item->titulo }}</td>
                                                                <td>{{ $item->valor_estimado }}</td>
                                                                <td>{{ $item->etapa }}</td>
                                                                <td>{{ $item->fecha_cierre_estimada }}</td>
                                                                <td>{{ $item->descripcion }}</td>
                                                                <td>
                                                                    <div class="d-grid gap-2">
                                                                        <a class="btn btn-outline-secondary"
                                                                            href="{{ route('Oportunidad.edit', $item->id) }}" role="button">Editar</a>
                                                                        <a class="btn btn-danger" href="{{ route('Oportunidad.show', $item->id) }}"
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