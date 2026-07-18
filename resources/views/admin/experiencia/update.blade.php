@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Expereincia
                    <a href="{{ route('Experiencia.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Experiencia.update', $experiencia->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="form-group">
                            <label for="input-2">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{$experiencia->nombre}}">
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
                        <div class="form-group">
                            <label for="input-2">Año Inicio</label>
                            <input type="number" class="form-control" name="inicio" value="{{$experiencia->inicio}}">
                            @error('inicio')
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
                            <label for="input-2">Año termino</label>
                            <input type="number" class="form-control" name="termino" value="{{$experiencia->termino}}">
                            @error('termino')
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
                            <label for="input-4">Institución</label>
                            <input type="text" class="form-control" name="lugar" value="{{$experiencia->lugar}}">
                            @error('lugar')
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
                            <label for="input-5">Descripción</label>
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control">{{$experiencia->descripcion}}</textarea>
                            @error('descripcion')
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
                             <br>
                            <button type="submit" class="btn btn-primary float-end">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection