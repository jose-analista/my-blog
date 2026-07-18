@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Fuente</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>tipo</th>
                    <th>url</th>
                    <th>nicho</th>
                    <th>descripcion</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pagina->nombre }}</td>
                        <td>{{ $pagina->tipo }}</td>
                        <td>{{ $pagina->url }}</td>
                        <td>{{ $pagina->nicho }}</td>
                        <td>{{ $pagina->descripcion }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Fuentes.destroy', $pagina->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Fuentes.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection