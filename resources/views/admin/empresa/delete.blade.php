@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Categoría</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>URL</th>
                    <th>Razón Social</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $empresa->rut }}</td>
                        <td>{{ $empresa->nombre }}</td>
                        <td>{{ $empresa->ubicacion }}</td>
                        <td>{{ $empresa->fono }}</td>
                        <td>{{ $empresa->correo }}</td>
                        <td>{{ $empresa->url }}</td>
                        <td>{{ $empresa->razon_social }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Empresa.destroy', $empresa->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Empresa.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection