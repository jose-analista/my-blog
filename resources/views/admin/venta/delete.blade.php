@extends ('layouts.inc.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Eliminar Venta</h5>
    <div class="card-body">
        <p class="card-text">
        <div class="alert alert-danger" role="alert">
            ¿Estás seguro de eliminar este registro?

            <table class="table table-sm table-hover">
                <thead>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Proyecto</th>
                    <th>Precio</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $venta->cliente->nombre }}</td>
                        <td>{{ optional($venta->empresa)->nombre ?? 'Sin empresa' }}</td>
                        <td>{{ optional($venta->proyecto)->nombre ?? 'Sin proyecto' }}</td>
                        <td>{{ $venta->precio }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('Venta.destroy', $venta->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('Venta.index') }}" class="btn btn-info">Volver</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </p>
    </div>
</div>

@endsection