@extends ('layouts.inc.admin')

@section('content')

@include('admin.proyecto.image-modal')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if($mensaje = Session::get('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ $mensaje }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-header">
                <h4>Actualizar Proyecto
                    <a href="{{ route('Proyecto.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Proyecto.update', $proyecto->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{$proyecto->nombre}}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Link de enlace</label>
                            <input type="text" name="link" class="form-control" value="{{$proyecto->link}}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Imagen</label>
                            @if($proyecto->imagen)
                            <img src="{{ asset($proyecto->imagen) }}" alt="" width="100px" height="100px"><!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Cambiar Imagen
                            </button>
                            @else
                            <h5>No hay imágenes</h5>
                            <input type="file" name="imagen" class="form-control" />
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Descripción</label>
                            <textarea name="descripcion" class="form-control" id="" cols="30"
                                rows="10">{{$proyecto->descripcion}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Empresa</label>
                            <select name="empresa_id" required class="form-control">
                                <option value="{{$proyecto->empresa_id}}">Empresa actual: {{$proyecto->empresa->nombre}}
                                </option>
                                @foreach ($empresa as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="input-5">Documento</label>
                            <input type="file" class="form-control" name="documento">
                            @error('documento')
                                <small>
                                    <strong>
                                        <div class="alert alert-danger" role="alert">
                                            Tipo de archivo no compatible con la imágenes
                                        </div>
                                    </strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="input-2">Estado</label>
                            <input type="checkbox" name="estado" {{ $proyecto->estado == '1' ? 'checked':'' }} /> <br>
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