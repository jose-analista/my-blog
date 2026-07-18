@extends ('layouts.inc.admin')

@section('content')

    @include('admin.venta.create-modal')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Venta
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
                        <table class="table table-sm table-bordered display align-middle" id="myTable">

                            <thead class="table-dark">

                                <tr>
                                    <th class="text-white">N.</th>
                                    <th class="text-white">Cliente</th>
                                    <th class="text-white">Empresa</th>
                                    <th class="text-white">Proyecto</th>
                                    <th class="text-white">Servicios</th>
                                    <th class="text-white">Precio</th>
                                    <th class="text-white text-center">Acciones</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php $contandor = 1; ?>

                                @forelse ($venta as $item)

                                    <tr>

                                        <td>
                                            {{ $contandor }}
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $item->cliente->nombre }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ optional($item->empresa)->nombre ?? 'Sin empresa' }}
                                        </td>

                                        <td>
                                            {{ optional($item->proyecto)->nombre ?? 'Sin proyecto' }}
                                        </td>

                                        <td width="280">

                                            @forelse($item->servicios as $servicio)

                                                <div class="border rounded-3 p-2 mb-2 bg-light">

                                                    <div class="d-flex justify-content-between align-items-center">

                                                        <div>

                                                            <strong>
                                                                {{ $servicio->nombre }}
                                                            </strong>

                                                            <br>

                                                            <small class="text-muted">
                                                                {{ $servicio->categoria }}
                                                            </small>

                                                        </div>

                                                        <span class="badge bg-success rounded-pill">

                                                            x{{ $servicio->pivot->cantidad }}

                                                        </span>

                                                    </div>

                                                </div>

                                            @empty

                                                <span class="badge bg-secondary">
                                                    Sin servicios
                                                </span>

                                            @endforelse

                                        </td>

                                        <td>

                                            <span class="fw-bold text-success">

                                                ${{ number_format($item->precio, 0, ',', '.') }}

                                            </span>

                                        </td>

                                        <td>

                                            <div class="d-grid gap-2">

                                                <a class="btn btn-outline-danger btn-sm"
                                                    href="{{ route('Venta.imprimir', $item->id) }}" target="_blank">

                                                    <i class="fa fa-print"></i>
                                                    Imprimir

                                                </a>

                                                <a class="btn btn-outline-secondary btn-sm"
                                                    href="{{ route('Venta.edit', $item->id) }}">

                                                    <i class="fa fa-edit"></i>
                                                    Editar

                                                </a>

                                                <a class="btn btn-danger btn-sm" href="{{ route('Venta.show', $item->id) }}">

                                                    <i class="fa fa-trash"></i>
                                                    Eliminar

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                    <?php    $contandor++; ?>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            <div class="text-muted">

                                                <h5>
                                                    No hay ventas registradas
                                                </h5>

                                            </div>

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