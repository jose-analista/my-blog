@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <h5 class="card-header bg-danger text-white">Confirmar Eliminación de Oportunidad</h5>
        <div class="card-body">
            <div class="alert alert-warning border-danger">
                <h5 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ¡Atención!</h5>
                <p>Estás a punto de eliminar permanentemente esta oportunidad comercial. Esta acción no se puede deshacer.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Etapa</th>
                            <th>Valor Estimado</th>
                            <th>Fecha de Cierre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $oportunidad->titulo }}</td>
                            <td>{{ $oportunidad->empresa->nombre }}</td>
                            <td>{{ ucfirst($oportunidad->etapa) }}</td>
                            <td>{{ $oportunidad->valor_estimado }}</td>
                            <td>{{ $oportunidad->fecha_cierre_estimada }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <form action="{{ route('Oportunidad.destroy', $oportunidad->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <a href="{{ route('Oportunidad.index') }}" class="btn btn-secondary me-2">
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