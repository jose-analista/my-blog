@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Cliente</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>A. Paterno</th>
                    <th>A. Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Red Social</th>
                    <th>Empresa</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cliente->rut }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->a_paterno }}</td>
                        <td>{{ $cliente->a_materno }}</td>
                        <td>{{ $cliente->fono }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->cargo }}</td>
                        <td>{{ $cliente->red_social }}</td>
                        <td>{{ $cliente->empresa->nombre }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Cliente.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Cliente.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection