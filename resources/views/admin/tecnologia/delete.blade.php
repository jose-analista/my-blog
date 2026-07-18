@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Tecnología</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Porciento</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tecnologia->nombre }}</td>
                        <td>{{ $tecnologia->tipo }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Tecnologia.destroy', $tecnologia->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Tecnologia.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection