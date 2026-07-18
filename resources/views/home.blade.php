@extends('layouts.inc.admin')

@section('content')

    @include('admin.usuario.create-modal')

    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Panel</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Panel de control</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total de Empresas</h6>
                            <h3 class="text-bold mb-10">{{ $totalEmpresas }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="lni lni-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total de Clientes</h6>
                            <h3 class="text-bold mb-10">{{ $totalcliente }}</h3>

                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total de proyectos</h6>
                            <h3 class="text-bold mb-10">{{ $totalproyecto }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>



                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">

                            <i class="lni lni-dollar"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total de Ventas</h6>
                            <?php
    $contandorventa = 0;
                                ?>
                            @forelse ($venta as $item)
                                                    <?php
                                $contandorventa++;
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
                            <h3 class="text-bold mb-10"><?php echo $contandorventa?></h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->

                </div>
                <!-- End Col -->
            </div>
            <!-- ================= GRAFICOS ================= -->

            <div class="row">

                <div class="col-xl-12">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="card-title mb-1">
                        Ventas
                    </h4>

                    <p class="text-muted mb-0">
                        Total vendido por día
                    </p>
                </div>

                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width:55px;height:55px;">

                    <i class="fa fa-dollar-sign"></i>

                </div>

            </div>

            <div id="chartVentas"></div>

        </div>
    </div>
</div>

                <!-- Grafico empresas -->
                <div class="col-xl-8 col-lg-7 col-md-12">

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div>
                                    <h4 class="card-title mb-1">
                                        Empresas agregadas
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Estadísticas por día
                                    </p>
                                </div>

                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;">

                                    <img src="{{asset('img/icon/empresa1.png')}}" alt="" width="22" height="22">

                                </div>

                            </div>

                            <div id="chartenterprisecount"></div>

                        </div>

                    </div>

                </div>

                <!-- Grafico tareas -->
                <div class="col-xl-4 col-lg-5 col-md-12">

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-body text-center">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="text-start">
                                    <h4 class="card-title mb-1">
                                        Estado de tareas
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Pendientes vs completadas
                                    </p>
                                </div>

                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:55px;height:55px;">

                                    <img src="{{asset('img/icon/task.svg')}}" alt="" width="22" height="22">

                                </div>

                            </div>

                            <div id="chartTareas"></div>

                            <div class="row mt-4">

                                <div class="col-6">

                                    <h3 class="text-warning">
                                        {{ $pendientes }}
                                    </h3>

                                    <small class="text-muted">
                                        Pendientes
                                    </small>

                                </div>

                                <div class="col-6">

                                    <h3 class="text-success">
                                        {{ $completadas }}
                                    </h3>

                                    <small class="text-muted">
                                        Completadas
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    var options = {
                        chart: {
                            type: 'line'
                        },
                        series: [
                            {
                                name: 'Empresas por día',
                                data: {!! json_encode($totales) !!}
                            }
                        ],
                        xaxis: {
                            categories: {!! json_encode($fechas) !!}
                        },
                        stroke: {
                            curve: 'smooth'
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chartenterprisecount"), options);
                    chart.render();

                });
            </script>

            <script>

                document.addEventListener('DOMContentLoaded', function () {

                    var optionsTareas = {

                        chart: {
                            type: 'donut'
                        },

                        series: [
                        {{ $pendientes }},
                            {{ $completadas }}
                        ],

                        labels: [
                            'Pendientes',
                            'Completadas'
                        ],

                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]

                    };

                    var chartTareas = new ApexCharts(
                        document.querySelector("#chartTareas"),
                        optionsTareas
                    );

                    chartTareas.render();

                });

            </script>

            <script>
document.addEventListener('DOMContentLoaded', function () {

    var optionsVentas = {

        chart: {
            type: 'area',
            height: 350,
            toolbar: {
                show: false
            }
        },

        series: [{
            name: 'Ventas',
            data: {!! json_encode($totalesVentas) !!}
        }],

        xaxis: {
            categories: {!! json_encode($fechasVentas) !!}
        },

        dataLabels: {
            enabled: false
        },

        stroke: {
            curve: 'smooth',
            width: 3
        },

        yaxis: {
            labels: {
                formatter: function(value) {
                    return '$' + value.toLocaleString();
                }
            }
        },

        tooltip: {
            y: {
                formatter: function(value) {
                    return '$' + value.toLocaleString();
                }
            }
        }
    };

    var chartVentas = new ApexCharts(
        document.querySelector("#chartVentas"),
        optionsVentas
    );

    chartVentas.render();

});
</script>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Usuarios registrados
                            </h4>
                        </div>
                        @if($mensaje = Session::get('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ $mensaje }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Agregar
                            </button>

                            </br>
                            </br>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered display" id="myTable">
                                    <thead>
                                        <th class="text-white">N.</th>
                                        <th class="text-white">Imagen</th>
                                        <th class="text-white">Nombre</th>
                                        <th class="text-white">Rol</th>
                                        <th class="text-white">Teléfono</th>
                                        <th class="text-white">Correo</th>
                                        <th class="text-white">Contraseña hash</th>
                                        <th class="text-white">Creado</th>
                                        <th class="text-white">Actualizado</th>
                                        <th class="text-white">Acciones</th>
                                    </thead>
                                    <tbody>
                                        <?php
    $contandor = 1;
                                ?>
                                        @forelse ($user as $item)
                                                                            <tr>
                                                                                <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                                                                <td><?php    echo $contandor?></td>
                                                                                <td>
                                                                                    @if($item->imagen)
                                                                                        <img src="{{ asset($item->imagen) }}" alt="" width="100px" height="100px">
                                                                                    @else
                                                                                        <h5>No hay imagen</h5>
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $item->name }}</td>
                                                                                <td>{{ $item->role_as == '1' ? 'Administrador' : 'Cliente' }}</td>
                                                                                <td>{{ $item->fono }}</td>
                                                                                <td>{{ $item->email }}</td>
                                                                                <td>{{ $item->password }}</td>
                                                                                <td>{{ $item->created_at }}</td>
                                                                                <td>{{ $item->updated_at}}</td>
                                                                                <td>
                                                                                    <div class="d-grid gap-2">
                                                                                        <a class="btn btn-warning" href="{{ route('User.edit', $item->id) }}"
                                                                                            role="button">Editar</a>
                                                                                        <a class="btn btn-danger" href="{{ route('User.show', $item->id) }}"
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
            <!-- end container -->
            <div class="container">
                <!-- <h4>🔐 Vault Seguro</h4> -->

                <!-- CLAVE -->
                <!-- <div class="mb-3">
                    <input type="password" id="key" class="form-control" placeholder="Clave de acceso">
                </div> -->

                <!-- BOTONES -->
                <!-- <div class="mb-3">
                    <button class="btn btn-primary" onclick="cargar()">🔄 Cargar</button>
                    <button class="btn btn-success" onclick="guardar()">💾 Guardar</button>
                    <button class="btn btn-secondary" onclick="agregar()">➕ Agregar</button>
                </div> -->

                <!-- TABLA -->
                <!-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Valor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tabla"></tbody>
                </table> -->
            </div>

    </section>


    <!-- ========== section end ========== -->
    <!--Chart.js-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

@endsection