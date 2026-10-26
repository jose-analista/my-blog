@extends('layouts.inc.admin')

@section('content')

    @include('admin.usuario.create-modal')

    @php
        $tarjetas = [
            ['titulo' => 'Total de empresas', 'valor' => $totalEmpresas, 'color' => 'purple', 'icono' => 'lni-cart-full'],
            ['titulo' => 'Total de clientes', 'valor' => $totalcliente, 'color' => 'success', 'icono' => 'lni-user'],
            ['titulo' => 'Total de proyectos', 'valor' => $totalproyecto, 'color' => 'primary', 'icono' => 'lni-credit-cards'],
            ['titulo' => 'Total de ventas', 'valor' => $venta->count(), 'color' => 'orange', 'icono' => 'lni-dollar'],
        ];
    @endphp

    <section class="section">
        <div class="container-fluid">

            {{-- ========== Título ========== --}}
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Panel</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Panel de control</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ========== Tarjetas de totales ========== --}}
            <div class="row">
                @foreach ($tarjetas as $tarjeta)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon {{ $tarjeta['color'] }}">
                                <i class="lni {{ $tarjeta['icono'] }}"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">{{ $tarjeta['titulo'] }}</h6>
                                <h3 class="text-bold mb-10">{{ $tarjeta['valor'] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ========== Gráficos ========== --}}
            <div class="row">

                {{-- Ventas --}}
                <div class="col-xl-12">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h4 class="card-title mb-1">Ventas</h4>
                                    <p class="text-muted mb-0">Total vendido por día</p>
                                </div>
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;">
                                    <i class="lni lni-dollar"></i>
                                </div>
                            </div>
                            <div id="chartVentas"></div>
                        </div>
                    </div>
                </div>

                {{-- Empresas --}}
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h4 class="card-title mb-1">Empresas agregadas</h4>
                                    <p class="text-muted mb-0">Estadísticas por día</p>
                                </div>
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;">
                                    <img src="{{ asset('img/icon/empresa1.png') }}" alt="" width="22" height="22">
                                </div>
                            </div>
                            <div id="chartenterprisecount"></div>
                        </div>
                    </div>
                </div>

                {{-- Tareas --}}
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="text-start">
                                    <h4 class="card-title mb-1">Estado de tareas</h4>
                                    <p class="text-muted mb-0">Pendientes y completadas</p>
                                </div>
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;">
                                    <img src="{{ asset('img/icon/task.svg') }}" alt="" width="22" height="22">
                                </div>
                            </div>

                            <div id="chartTareas"></div>

                            <div class="row mt-4">
                                <div class="col-6">
                                    <h3 class="text-warning">{{ $pendientes }}</h3>
                                    <small class="text-muted">Pendientes</small>
                                </div>
                                <div class="col-6">
                                    <h3 class="text-success">{{ $completadas }}</h3>
                                    <small class="text-muted">Completadas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ========== Usuarios ========== --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Usuarios registrados</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Agregar
                            </button>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-info alert-dismissible fade show m-3 mb-0" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered display" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-white">N.</th>
                                            <th class="text-white">Imagen</th>
                                            <th class="text-white">Nombre</th>
                                            <th class="text-white">Rol</th>
                                            <th class="text-white">Teléfono</th>
                                            <th class="text-white">Correo</th>
                                            <th class="text-white">Creado</th>
                                            <th class="text-white">Actualizado</th>
                                            <th class="text-white">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($item->imagen)
                                                        <img src="{{ asset($item->imagen) }}"
                                                            alt="Foto de {{ $item->name }}"
                                                            width="60" height="60" class="rounded object-fit-cover">
                                                    @else
                                                        <span class="text-muted">Sin imagen</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role_as == 1 ? 'Administrador' : 'Cliente' }}</td>
                                                <td>{{ $item->fono }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at?->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->updated_at?->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <a class="btn btn-warning btn-sm"
                                                            href="{{ route('User.edit', $item->id) }}">Editar</a>

                                                        <form action="{{ route('User.destroy', $item->id) }}" method="POST"
                                                            onsubmit="return confirm('¿Eliminar este usuario?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ========== Scripts ========== --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.54.1"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const peso = (valor) => '$' + Number(valor).toLocaleString('es-CL');

            function dibujar(selector, opciones) {
                const el = document.querySelector(selector);
                if (el) new ApexCharts(el, opciones).render();
            }

            // Ventas por día
            dibujar('#chartVentas', {
                chart: { type: 'area', height: 350, toolbar: { show: false } },
                series: [{ name: 'Ventas', data: {{ Js::from($totalesVentas) }} }],
                xaxis: { categories: {{ Js::from($fechasVentas) }} },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 3 },
                yaxis: { labels: { formatter: peso } },
                tooltip: { y: { formatter: peso } },
            });

            // Empresas por día
            dibujar('#chartenterprisecount', {
                chart: { type: 'line', height: 320, toolbar: { show: false } },
                series: [{ name: 'Empresas por día', data: {{ Js::from($totales) }} }],
                xaxis: { categories: {{ Js::from($fechas) }} },
                stroke: { curve: 'smooth' },
            });

            // Estado de tareas
            dibujar('#chartTareas', {
                chart: { type: 'donut' },
                series: [{{ (int) $pendientes }}, {{ (int) $completadas }}],
                labels: ['Pendientes', 'Completadas'],
                responsive: [{
                    breakpoint: 480,
                    options: { chart: { width: 300 }, legend: { position: 'bottom' } },
                }],
            });
        });
    </script>

@endsection