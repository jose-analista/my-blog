@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Cliente
                    <a href="{{ route('Cliente.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Cliente.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Rut</label>
                            <input type="text" name="rut" class="form-control" value="{{$cliente->rut}}" />
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
                            <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}" />
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
                            <label>A. Paterno</label>
                            <input type="text" name="a_paterno" class="form-control" value="{{$cliente->a_paterno}}" />
                            @error('a_paterno')
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
                            <label>A. Materno</label>
                            <input type="text" name="a_materno" class="form-control" value="{{$cliente->a_materno}}" />
                            @error('a_materno')
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
                            <input type="text" name="fono" class="form-control" value="{{$cliente->fono}}" />
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
                            <input type="email" name="correo" class="form-control" value="{{$cliente->correo}}" />
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
                            <label>Cargo</label>
                            <input type="text" name="cargo" class="form-control" value="{{$cliente->cargo}}" />
                            @error('cargo')
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
                            <label>Red Social</label>
                            <input type="text" name="red_social" class="form-control" value="{{$cliente->red_social}}" />
                            @error('cargo')
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
    <label>Empresa</label>

    <select name="empresa_id" class="form-control">
        
        {{-- 🔥 Empresa actual --}}
        <option value="">
            {{ $cliente->empresa?->nombre ?? 'Sin empresa' }}
        </option>

        {{-- 🔽 Listado de empresas --}}
        @foreach ($empresa as $item)
            <option value="{{ $item->id }}"
                {{ $cliente->empresa_id == $item->id ? 'selected' : '' }}>
                {{ $item->nombre }}
            </option>
        @endforeach

    </select>

    @error('empresa_id')
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