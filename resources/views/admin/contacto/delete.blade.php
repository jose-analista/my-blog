@extends ('layouts.inc.admin2')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Contacto</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->correo }}</td>
                        <td>{{ $contacto->asunto }}</td>
                        <td>{{ $contacto->mensaje }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Contacto.destroy', $contacto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Contacto.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection