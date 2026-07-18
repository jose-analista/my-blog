@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">

    <div class="card border-danger">

        <div class="card-header bg-danger text-white">
            <h4>Eliminar Seguimiento</h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning">
                ¿Estás seguro que deseas eliminar esta interacción?
            </div>

            {{-- DATOS --}}
            <div class="mb-3">
                <strong>Empresa:</strong>
                {{ $interaccion->empresa->nombre ?? 'Sin empresa' }}
            </div>

            <div class="mb-3">
                <strong>Responsable:</strong>
                {{ $interaccion->user->name ?? 'Sin usuario' }}
            </div>

            <div class="mb-3">
                <strong>Tipo:</strong>
                {{ ucfirst($interaccion->tipo) }}
            </div>

            <div class="mb-3">
                <strong>Notas:</strong>
                <div class="border rounded p-3 bg-light">
                    {{ $interaccion->notas }}
                </div>
            </div>

            <div class="mb-3">
                <strong>Fecha:</strong>
                {{ \Carbon\Carbon::parse($interaccion->fecha_interaccion)->format('d/m/Y H:i') }}
            </div>

            <hr>

            {{-- FORMULARIO --}}
            <form action="{{ route('Interaccion.destroy', $interaccion->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <div class="text-end">

                    <a href="{{ route('Interaccion.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="btn btn-danger">
                        Sí, eliminar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection