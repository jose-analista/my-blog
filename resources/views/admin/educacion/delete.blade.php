@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Educación</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Año inicio</th>
                    <th>Año termino</th>
                    <th>Institucion</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $educacion->nombre }}</td>
                        <td>{{ $educacion->inicio }}</td>
                        <td>{{ $educacion->termino }}</td>
                        <td>{{ $educacion->institucion }}</td>
                        <td>{{ $educacion->descripcion }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Educacion.destroy', $educacion->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Educacion.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection