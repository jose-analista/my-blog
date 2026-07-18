@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <h5 class="card-header bg-danger text-white">Confirmar Eliminación de Servicio</h5>
        <div class="card-body">
            <div class="alert alert-warning border-danger">
                <h5 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ¡Atención!</h5>
                <p>Estás a punto de eliminar permanentemente el servicio <strong>{{ $servicio->nombre }}</strong>. Esta acción no se puede deshacer.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Servicio</th>
                            <th>Categoría</th>
                            <th>Tarifa Base</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $servicio->id }}</td>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->categoria }}</td>
                            <td>{{ $servicio->moneda }} {{ number_format($servicio->tarifa_base, 2) }}</td>
                            <td>
                                <span class="badge {{ $servicio->estado == 'activo' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($servicio->estado) }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <!-- FORMULARIO DE ELIMINACIÓN -->
                <form action="{{ route('Servicios.destroy', $servicio->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <a href="{{ route('Servicios.index') }}" class="btn btn-secondary me-2">
                        <i class="fa fa-arrow-left"></i> Cancelar y Volver
                    </a>
                    
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Confirmar Eliminación Definitiva
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection