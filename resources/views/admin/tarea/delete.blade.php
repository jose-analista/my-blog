@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <h5 class="card-header bg-danger text-white">Confirmar Eliminación de Tarea</h5>

        <div class="card-body">

            <div class="alert alert-warning border-danger">
                <h5 class="alert-heading">
                    <i class="fa fa-exclamation-triangle"></i> ¡Atención!
                </h5>
                <p>
                    Estás a punto de eliminar permanentemente esta tarea. 
                    Esta acción no se puede deshacer.
                </p>
            </div>

            <!-- INFO DE LA TAREA -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Asignado</th>
                            <th>Prioridad</th>
                            <th>Fecha Vencimiento</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $tarea->titulo }}</td>
                            <td>{{ $tarea->empresa->nombre ?? 'N/A' }}</td>
                            <td>{{ $tarea->user->name ?? 'N/A' }}</td>
                            <td>{{ ucfirst($tarea->prioridad) }}</td>
                            <td>{{ $tarea->fecha_vencimiento }}</td>
                            <td>
                                <span class="badge {{ $tarea->completada ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $tarea->completada ? 'Completada' : 'Pendiente' }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <!-- BOTONES -->
            <div class="d-flex justify-content-end">
                
                <a href="{{ route('Tareas.index') }}" class="btn btn-secondary me-2">
                    <i class="fa fa-arrow-left"></i> Cancelar y Volver
                </a>

                <form action="{{ route('Tareas.destroy', $tarea->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Confirmar Eliminación
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection