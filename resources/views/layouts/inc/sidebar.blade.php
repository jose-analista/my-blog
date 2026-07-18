<header id="navbarColor" class="header py-1 px-2 text-white fixed-top bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">

                    <div class="menu-toggle-btn mr-20">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                            <img src="{{asset('img/icon/menu.svg')}}" alt="" width="22" height="22">
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right d-flex align-items-center justify-content-end">

                    <!-- NOTIFICACIONES -->
                    <div class="dropdown me-3">

                        <button class="btn btn-light position-relative p-1 px-2 border-0 shadow-sm" type="button"
                            id="dropdownNotificaciones" data-bs-toggle="dropdown" aria-expanded="false"
                            style="height:35px; min-width:35px;">

                            <img src="{{ asset('img/icon/notification.svg') }}" alt="" width="18" height="18">

                            @if(auth()->user()->unreadNotifications->count() > 0)

                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    style="font-size:10px; padding:4px 6px;">

                                    {{ auth()->user()->unreadNotifications->count() }}

                                </span>

                            @endif

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownNotificaciones"
                            style="width: 450px; max-height: 400px; overflow-y: auto;">

                            <li class="dropdown-header fw-bold">
                                Notificaciones
                            </li>

                            <!-- ITEMS -->
                            @forelse(auth()->user()->unreadNotifications as $notificacion)

                                <li>

                                    <a class="dropdown-item px-4 py-3 border-bottom"
                                        href="{{ route('notificacion.leer', $notificacion->id) }}">

                                        <div class="d-flex align-items-start gap-3">

                                            <!-- IMAGEN USUARIO -->
                                            <div>

                                                @if(Auth::user()->imagen)

                                                    <img src="{{ asset(Auth::user()->imagen) }}" alt=""
                                                        class="rounded-circle shadow-sm" width="45" height="45"
                                                        style="object-fit: cover;">

                                                @else

                                                    <img src="{{ asset('img/usuario/negro.jpg') }}" alt=""
                                                        class="rounded-circle shadow-sm" width="45" height="45"
                                                        style="object-fit: cover;">

                                                @endif

                                            </div>

                                            <!-- CONTENIDO -->
                                            <div class="w-100">

                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="fw-semibold text-dark">

                                                        {{ Auth::user()->name }}

                                                    </div>

                                                

                                                </div>

                                                <div class="fw-bold text-primary mt-1">

                                                    {{ $notificacion->data['titulo'] }}

                                                </div>

                                                <small class="text-muted d-block mt-1">

                                                    {{ $notificacion->data['mensaje'] }}

                                                </small>
                                                    <small class="text-muted">

                                                        {{ $notificacion->created_at->diffForHumans() }}

                                                    </small>

                                            </div>

                                        </div>

                                    </a>

                                </li>

                            @empty

                                <li>

                                    <div class="text-center p-4">

                                        <img src="{{ asset('img/icon/notification.svg') }}" width="40"
                                            class="opacity-50 mb-2">

                                        <p class="text-muted mb-0">
                                            No tienes notificaciones
                                        </p>

                                    </div>

                                </li>

                            @endforelse

                        </ul>

                    </div>

                    <!-- BUSCADOR -->
                    <div class="profile-box ml-15">

                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                            data-bs-target="#exampleModalbuscar">

                            <img src="{{ asset('img/icon/buscar.png') }}" alt="" width="20px" height="20px">

                        </button>

                        @include('layouts.inc.modal-busqueda') --}}
                      
                        <!-- PERFIL -->
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            <div class="profile-info">
                                <div class="info">

                                    <h5 class="text-light">
                                        {{ Auth::user()->name }}
                                    </h5>

                                    <div class="image">

                                        @if(Auth::user()->imagen)

                                            <img src="{{ asset(Auth::user()->imagen) }}" alt="" height="40px">

                                        @else

                                            <img src="{{ asset('img/usuario/negro.jpg') }}" alt="" height="40px">

                                        @endif

                                    </div>

                                </div>
                            </div>

                            <i class="lni lni-chevron-down"></i>

                        </button>

                        <!-- DROPDOWN PERFIL -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">

                            <li>
                                <a href="{{ route('Usuario.configuration', Auth::user()->id) }}">

                                    <i class="lni lni-cog"></i>

                                    Configuración

                                </a>
                            </li>

                            <li>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">

                                    <i class="mdi mdi-logout text-primary"></i>

                                    Salir

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                    @csrf

                                </form>

                            </li>

                        </ul>

                    </div>
                    <!-- profile end -->

                </div>
            </div>
        </div>
    </div>
</header>
<br>
<br>
