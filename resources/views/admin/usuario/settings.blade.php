@extends ('layouts.inc.admin')

@section('content')

<style>
    .config-card{
        border:none;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
    }

    .config-header{
        background:linear-gradient(135deg,#0d6efd,#0b5ed7);
        padding:25px;
        color:white;
    }

    .config-header h4{
        font-weight:700;
        margin:0;
    }

    .profile-preview{
        width:110px;
        height:110px;
        border-radius:50%;
        object-fit:cover;
        border:4px solid #fff;
        box-shadow:0 5px 20px rgba(0,0,0,0.15);
    }

    .form-control{
        border-radius:12px;
        padding:12px;
        border:1px solid #dcdcdc;
    }

    .form-control:focus{
        box-shadow:none;
        border-color:#0d6efd;
    }

    .setting-box{
        background:#f8f9fa;
        border-radius:15px;
        padding:20px;
        margin-bottom:20px;
    }

    .theme-color{
        width:45px;
        height:45px;
        border:none;
        background:none;
        cursor:pointer;
    }

    .btn-save{
        border-radius:12px;
        padding:10px 25px;
        font-weight:600;
    }

    .section-title{
        font-size:18px;
        font-weight:700;
        margin-bottom:20px;
        color:#212529;
    }
</style>

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card config-card">

                <!-- HEADER -->
                <div class="config-header d-flex justify-content-between align-items-center flex-wrap">

                    <div>
                        <h4 class="text-light">
                            Configuración de Usuario
                        </h4>

                        <small>
                            Administra tu cuenta y personaliza el sistema
                        </small>
                    </div>

                    <a href="{{ route('home') }}" class="btn btn-light text-primary fw-bold">
                        Volver
                    </a>

                </div>

                <div class="card-body p-4">

                    @if($mensaje = Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ $mensaje }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                    </div>

                    @endif

                    <form action="{{ route('Usuario.configurationupdate', Auth::user()->id ) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <div class="row">

                            <!-- PERFIL -->
                            <div class="col-lg-4">

                                <div class="setting-box text-center">

                                    @if($usuario->imagen)

                                    <img src="{{ asset($usuario->imagen) }}"
                                        class="profile-preview mb-3">

                                    @else

                                    <img src="{{ asset('img/usuario/negro.jpg') }}"
                                        class="profile-preview mb-3">

                                    @endif

                                    <h5 class="fw-bold">
                                        {{ $usuario->name }}
                                    </h5>

                                    <p class="text-muted mb-0">
                                        {{ $usuario->email }}
                                    </p>

                                </div>

                                <!-- CONFIGURACION TEMA -->
                                <div class="setting-box">

                                    <div class="section-title">
                                        Tema del Sistema
                                    </div>

                                    <label class="fw-semibold mb-2">
                                        Color Navbar
                                    </label>

                                     <div class="me-3 d-flex align-items-center">

                            <input type="color" id="colorPicker" value="" title="Cambiar color navbar" style="
            width:35px;
            height:35px;
            border:none;
            background:none;
            cursor:pointer;
        ">

                        </div>

                                </div>

                            </div>

                            <!-- FORMULARIO -->
                            <div class="col-lg-8">

                                <div class="setting-box">

                                    <div class="section-title">
                                        Información Personal
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-semibold">
                                                Nombre
                                            </label>

                                            <input type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{$usuario->name}}">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-semibold">
                                                Correo
                                            </label>

                                            <input type="email"
                                                name="email"
                                                class="form-control"
                                                value="{{$usuario->email}}">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-semibold">
                                                Imagen de Perfil
                                            </label>

                                            <input type="file"
                                                name="imagen"
                                                class="form-control">

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-semibold">
                                                Contraseña Administrador
                                            </label>

                                            <input type="password"
                                                name="password"
                                                class="form-control">

                                        </div>

                                    </div>

                                </div>

                                <div class="text-end">

                                    <button type="submit"
                                        class="btn btn-primary btn-save">

                                        Guardar Cambios

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection