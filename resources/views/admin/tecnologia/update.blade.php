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
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{$tecnologia->nombre}}" />
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
                            <label>Tipo</label>
                            <input type="text" name="tipo" class="form-control" value="{{$tecnologia->tipo}}" />
                            @error('tipo')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-5">Imagen</label>
                            <input type="file" class="form-control" name="imagen">
                            @error('imagen')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Tipo de archivo no compatible con la imágenes
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