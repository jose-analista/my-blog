@extends ('layouts.inc.admin')

@section('content')

@include('admin.experiencia.create-modal')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Educación
                </h4>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <img src="{{asset('img/icon/add.svg')}}" alt="" width="25px" height="25px">
                    Agregar
                </button>

                </br>
                </br>
                <div class="table table-reposive">
                    <table class="table table-sm table-bordered display" id="myTable">
                        <thead>
                            <th class="text-white">N.</th>
                            <th class="text-white">Nombre</th>
                            <th class="text-white">Año inicio</th>
                            <th class="text-white">Año termino</th>
                            <th class="text-white">Lugar de trabajo</th>
                            <th class="text-white">Descripción</th>
                            <th class="text-white">Acciones</th>
                        </thead>
                        <tbody>
                            <?php
                                $contandor=1;
                            ?>
                            @forelse ($experiencia as $item)
                            <tr>
                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                <td><?php echo $contandor?></td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->inicio}}</td>
                                <td>{{$item->termino}}</td>
                                <td>{{$item->lugar}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-outline-secondary" href="{{ route('Experiencia.edit', $item->id) }}"
                                            role="button">Editar</a>
                                        <a class="btn btn-danger" href="{{ route('Experiencia.show', $item->id) }}"
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