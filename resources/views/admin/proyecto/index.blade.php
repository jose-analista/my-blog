@extends ('layouts.inc.admin')

@section('content')

    @include('admin.proyecto.create-modal')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Proyecto
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
                                <th class="text-white">Imagen</th>
                                <th class="text-white">Descripción</th>
                                <th class="text-white">Empresa</th>
                                <th class="text-white">Estado</th>
                                <th class="text-white">Enlace</th>
                                <th class="text-white">Documentación</th>
                                <th class="text-white">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
    $contandor = 1;
                                ?>
                                @forelse ($proyecto as $item)
                                                            <tr>
                                                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                <td><?php echo $contandor?></td>
                                                                <td>{{$item->nombre}}</td>
                                                                <td>
                                                                    @if($item->imagen)
                                                                        <img src="{{ asset($item->imagen) }}" alt="" width="100px" height="100px">
                                                                    @else
                                                                        <h5>No hay imagen</h5>
                                                                    @endif
                                                                </td>
                                                                <td>{{$item->descripcion}}</td>
                                                                <td>{{$item->empresa->nombre}}</td>
                                                                <td>{{$item->estado == '0' ? 'No visible' : 'Visible'}}</td>
                                                                <td><a href="{{$item->link}}" target="__blank">{{$item->link}}</a></td>
<td>
    @if($item->documento)
        <a href="{{ route('documento.ver', $item->id) }}" target="_blank">
            Ver documento
        </a>
    @else
        <span>Sin documento</span>
    @endif
</td>                                                                <td>
                                                                    <div class="d-grid gap-2">
                                                                        <a class="btn btn-outline-secondary"
                                                                            href="{{ route('Proyecto.edit', $item->id) }}" role="button">Editar</a>
                                                                        <a class="btn btn-danger" href="{{ route('Proyecto.show', $item->id) }}"
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