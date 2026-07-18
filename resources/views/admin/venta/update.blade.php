@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Actualizar Venta
                    <a href="{{ route('Venta.index') }}" class="btn btn-primary float-end">Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Venta.update', $venta->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Cliente</label>
                            <select name="cliente_id" required class="form-control">
                                <option value="{{$venta->cliente_id}}">Cliente actual: {{$venta->cliente->nombre}}
                                </option>
                                @foreach ($cliente as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
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
                            <select name="empresa_id" required class="form-control">
                                <option value="{{$venta->empresa_id}}">Empresa actual: {{$venta->empresa->nombre}}
                                </option>
                                @foreach ($empresa as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
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
                        <div class="col-md-6 mb-3">
                            <label>Proyecto</label>
                            <select name="proyecto_id" required class="form-control">
                                <option value="{{$venta->proyecto_id}}">Proyecto actual: {{$venta->proyecto->nombre}}
                                </option>
                                @foreach ($proyecto as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                            @error('proyecto_id')
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
                            <label>Precio</label>
                            <input type="number" name="precio" class="form-control" value="{{$venta->precio}}" />
                            @error('precio')
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