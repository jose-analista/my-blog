@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar Empresa</h4>
            <hr>

            <form action="{{ route('Empresa.store') }}" method="post">
                @csrf

                <!-- RUT -->
                <div class="form-group mb-3">
                    <label>Rut</label>
                    <input type="text" class="form-control" name="rut">
                    @error('rut')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- NOMBRE -->
                <div class="form-group mb-3">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                    @error('nombre')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- UBICACIÓN -->
                <div class="form-group mb-3">
                    <label>Ubicación</label>
                    <input type="text" class="form-control" name="ubicacion">
                    @error('ubicacion')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- TELÉFONO -->
                <div class="form-group mb-3">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" name="fono">
                    @error('fono')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- CORREO -->
                <div class="form-group mb-3">
                    <label>Correo</label>
                    <input type="email" class="form-control" name="correo">
                    @error('correo')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- CHECK WEB -->
                <div class="form-group mb-3">
                    <label>
                        <input type="checkbox" id="tieneWeb"> Tiene página web
                    </label>
                </div>

                <!-- URL -->
                <div class="form-group mb-3" id="campoUrl" style="display:none;">
                    <label>URL</label>
                    <input type="text" class="form-control" name="url" id="inputUrl">
                </div>

                <!-- RAZÓN SOCIAL -->
                <div class="form-group mb-3">
                    <label>Razón Social</label>
                    <input type="text" class="form-control" name="razon_social">
                    @error('razon_social')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- BOTONES -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- SCRIPT LIMPIO --}}
<script>
    const switchWeb = document.getElementById('tieneWeb');
    const campoUrl = document.getElementById('campoUrl');
    const inputUrl = document.getElementById('inputUrl');

    switchWeb.addEventListener('change', function () {
        if (this.checked) {
            campoUrl.style.display = 'block';
            inputUrl.disabled = false;
            inputUrl.value = '';
        } else {
            campoUrl.style.display = 'none';
            inputUrl.disabled = false; // 🔥 IMPORTANTE
            inputUrl.value = 'Sin página';
        }
    });

    // estado inicial
    window.addEventListener('load', function () {
        inputUrl.value = 'Sin página';
        inputUrl.disabled = false;
    });
</script>

@endsection