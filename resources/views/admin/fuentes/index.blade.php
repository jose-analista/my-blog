@extends ('layouts.inc.admin')

@section('content')

@include('admin.fuentes.create-modal')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Fuentes
                    </h4>
                </div>
    
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <img src="{{asset('img/icon/add.svg')}}" alt="" width="25px" height="25px">
                        Agregar
                    </button>

                    {{-- Busqueda de nicho --}}
                            <button class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal"
                                data-bs-target="#buscarnichofuenteModal">

                                <img src="{{ asset('img/icon/document.svg') }}" width="20" height="20">

                                Buscar por nicho

                            </button>
@include('admin.fuentes.modal.buscarnicho')
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
                            <div id="dvData">
                                <thead>
                                    <th class="text-white">N.</th>
                                    <th class="text-white">Nombre</th>
                                    <th class="text-white">Tipo</th>
                                    <th class="text-white">Url</th>
                                    <th class="text-white">Pestaña externa</th>
                                    <th class="text-white">Nicho</th>
                                    <th class="text-white">Descripcion</th>
                                    <th class="text-white">Acciones</th>
                                </thead>
                                <tbody>
                                    <?php
    $contandor = 1;
                                    ?>
                                    @forelse ($pagina as $item)

                                                                    <tr>
                                                                        <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                        <td><?php echo $contandor?></td>
                                                                        <td>{{ $item->nombre }}</td>
                                                                        <td>{{ $item->tipo }}</td>
                                             <td>
    <a href="{{$item->url}}" title="{{$item->url}}">
        {{ Str::limit($item->url, 5) }}
    </a>
</td>
<td><a href="{{$item->url}}" target="__blank">
    <img src="{{asset('img/icon/enlace.svg')}}" alt="" width="22" height="22">
</a></td>
                                                                        <td>{{ $item->nicho }} </td>
                                                                        <td>
   <button
        type="button"
        class="btn btn-info btn-sm mt-2"
        data-bs-toggle="modal"
        data-bs-target="#descripcionModalfuente{{ $item->id }}"
    >
        Ver
    </button>
       @include('admin.fuentes.descripcion-modal')

    
</td>
                                                                        <td>
                                                                            <div class="d-grid gap-2">
                                                                                <a title="Guarda tus cambios en la base de datos" class="btn btn-outline-secondary" href="{{ route('Fuentes.edit', $item->id) }}"
                                                                                    role="button">Editar</a>
                                                                                <a class="btn btn-danger" href="{{ route('Fuentes.show', $item->id) }}"
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
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection