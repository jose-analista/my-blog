@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Empresa
                    <a href="{{ route('Empresa.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Empresa.update', $empresa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Rut</label>
                            <input type="text" name="rut" class="form-control" value="{{$empresa->rut}}" />
                            @error('rut')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{$empresa->nombre}}" />
                            @error('nombre')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ubicación</label>
                            <input type="text" name="ubicacion" class="form-control" value="{{$empresa->ubicacion}}" />
                            @error('ubicacion')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="fono" class="form-control" value="{{$empresa->fono}}" />
                            @error('fono')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Correo</label>
                            <input type="email" name="correo" class="form-control" value="{{$empresa->correo}}" />
                            @error('correo')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                                          <div class="col-md-6 mb-3">
                         <div class="form-group">
    <label>Tiene página web?</label><br>
    <input type="checkbox" id="tieneWeb">
</div>

<div class="form-group" id="campoUrl">
    <label>URL</label>
    <input type="text" name="url" id="inputUrl" class="form-control"
        value="{{ $empresa->url }}" />
</div>

@error('razon_social')
<small>
    <strong>
        <div class="alert alert-danger" role="alert">
            Campo vacío
        </div>
    </strong>
</small>
@enderror

<script>
    const switchWeb = document.getElementById('tieneWeb');
    const campoUrl = document.getElementById('campoUrl');
    const inputUrl = document.getElementById('inputUrl');

    // 🔥 Detectar estado inicial
    window.addEventListener('load', function () {
        if (inputUrl.value === 'Sin página' || inputUrl.value === '' || inputUrl.value === null) {
            switchWeb.checked = false;
            campoUrl.style.display = 'none';
            inputUrl.value = 'Sin página';
            inputUrl.disabled = true;
        } else {
            switchWeb.checked = true;
            campoUrl.style.display = 'block';
            inputUrl.disabled = false;
        }
    });

    // 🔄 Cambio manual
    switchWeb.addEventListener('change', function () {
        if (this.checked) {
            campoUrl.style.display = 'block';
            inputUrl.disabled = false;
            inputUrl.value = '';
        } else {
            campoUrl.style.display = 'none';
            inputUrl.value = 'Sin página';
            inputUrl.disabled = true;
        }
    });
</script>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Razón Social</label>
                            <input type="text" name="razon_social" class="form-control"
                                value="{{$empresa->razon_social}}" />
                            @error('razon_social')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection