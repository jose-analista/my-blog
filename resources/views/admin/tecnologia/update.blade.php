@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Tecnología
                    <a href="{{ route('Tecnologia.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Tecnologia.update', $tecnologia->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                value="{{ old('nombre', $tecnologia->nombre) }}" />
                            @error('nombre')
                                <div class="alert alert-danger mt-2 py-1" role="alert">Campo vacío</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tipo">Tipo</label>
                            <input type="text" id="tipo" name="tipo" class="form-control"
                                value="{{ old('tipo', $tecnologia->tipo) }}" />
                            @error('tipo')
                                <div class="alert alert-danger mt-2 py-1" role="alert">Campo vacío</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="imagen">Imagen o SVG</label>

                            {{-- Imagen actual (se muestra con <img>, nunca en línea) --}}
                            @if ($tecnologia->imagen)
                                <div class="mb-2 d-flex align-items-center gap-3">
                                    <img src="{{ asset($tecnologia->imagen) }}" alt="{{ $tecnologia->nombre }}"
                                        width="64" height="64" style="object-fit: contain;">
                                    <small class="text-muted">Imagen actual. Sube otra solo si quieres reemplazarla.</small>
                                </div>
                            @endif

                            <input type="file" id="imagen" class="form-control" name="imagen"
                                accept=".jpg,.jpeg,.png,.gif,.svg,image/svg+xml">
                            <small class="text-muted">Formatos: JPG, PNG, GIF o SVG. Máximo 2 MB.</small>

                            @error('imagen')
                                <div class="alert alert-danger mt-2 py-1" role="alert">{{ $message }}</div>
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