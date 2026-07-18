@extends ('layouts.inc.admin2')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Experiencia</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Año inicio</th>
                    <th>Año termino</th>
                    <th>Lugar de trabajo</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $experiencia->nombre }}</td>
                        <td>{{ $experiencia->inicio }}</td>
                        <td>{{ $experiencia->termino }}</td>
                        <td>{{ $experiencia->institucion }}</td>
                        <td>{{ $experiencia->descripcion }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Experiencia.destroy', $experiencia->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Experiencia.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection