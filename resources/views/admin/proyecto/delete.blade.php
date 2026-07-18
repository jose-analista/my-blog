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
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Empresa</th>
                    <th>Documento</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>
                            @if($proyecto->imagen)
                            <img src="{{ asset($proyecto->imagen) }}" alt="" width="100px" height="100px">
                            @else
                            <h5>No hay imágenes</h5>
                            @endif
                        </td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td>{{ $proyecto->empresa->nombre }}</td>
                    <td>{{ $proyecto->documento }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Proyecto.destroy', $proyecto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Proyecto.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection