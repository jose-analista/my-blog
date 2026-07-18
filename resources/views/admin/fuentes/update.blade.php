@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Fuente
                    <a href="{{ route('Fuentes.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Fuentes.update', $pagina->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{$pagina->nombre}}" />
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
                            <label>tipo</label>
                            <input type="text" name="tipo" class="form-control" value="{{$pagina->tipo}}" />
                            <!-- @error('ubicacion')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>url</label>
                            <input type="text" name="url" class="form-control" value="{{$pagina->url}}" />
                            <!-- @error('fono')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nicho</label>
                            <input type="text" name="nicho" class="form-control" value="{{$pagina->nicho}}" />
                            <!-- @error('correo')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Descripcion</label>
                         
                                <textarea class="form-control"name="descripcion"  rows="3"
                        placeholder="">{{ $pagina->descripcion }}</textarea> 
                            <!-- @error('razon_social')
                            <small>
                                <strong>
                                    <div class="alert alert-danger" role="alert">
                                        Campo vacío
                                    </div>
                                </strong>
                            </small>
                            @enderror -->
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