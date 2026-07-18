@extends('layouts.inc.admin')

@section('content')

    @include('admin.requisitos.modal.modalrequisito')

    @include('admin.requisitos.modal.modaleditarrequisito')

    @include('admin.requisitos.modal.modaleliminarrequisito')

    <div class="container-fluid">

        <!-- Encabezado -->
        <div class="card border-0 shadow-sm mb-4 bg-primary text-white">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h2 class="mb-1">
                            <i class="fa fa-clipboard-list me-2"></i>
                            Levantamiento de Requisitos
                        </h2>
                        <p class="mb-0 opacity-75">
                            Registra y organiza los requerimientos del proyecto para generar cotizaciones y propuestas.
                        </p>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#addrequisito">
                        <img src="{{asset('img/icon/add.svg')}}" alt="" width="25px" height="25px">

                        Agregar
                    </button>
                </div>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">
                    <i class="fa fa-folder-open text-primary me-2"></i>
                    Información del Proyecto
                </h5>
            </div>

            <div class="card-body">


                <div class="text-center py-5">
                  

                    <div class="row">

                        @foreach($proyectos as $proyecto)

                            <div class="col-md-4 mb-4">

                                <div class="card shadow-sm h-100">

                                    <div class="card-body">
                                        @if($proyecto->imagen)

                                            <img src="{{ asset($proyecto->imagen) }}" class="card-img-top"
                                                style="height:220px; object-fit:cover;" alt="{{ $proyecto->nombre }}">

                                        @else

                                            <img src="{{ asset('img/sin-imagen.png') }}" class="card-img-top"
                                                style="height:220px; object-fit:cover;" alt="Sin imagen">

                                        @endif

                                        <h5 class="card-title">
                                            {{ $proyecto->nombre }}
                                        </h5>

                                        <p class="text-muted mb-2">
                                            {{ $proyecto->empresa?->nombre }}
                                        </p>

                                        <p>
                                            Requisitos:
                                            <span class="badge bg-primary">
                                                {{ $proyecto->requisitos->count() }}
                                            </span>
                                            ${{ number_format($proyecto->requisitos_sum_costo_estimado ?? 0, 0, ',', '.') }}
                                        </p>

                                        <a href="{{ route('Requisito.show', $proyecto->id) }}" class="btn btn-primary">

                                            Ver Requisitos

                                        </a>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection