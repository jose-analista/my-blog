@extends ('layouts.inc.admin')

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agregar Seguimiento</h4>
                <hr>

                <form action="{{ route('Interaccion.store') }}" method="post">
                    @csrf

                    <!-- empresa -->
               @include('layouts.componente.buscar-empresa')

                    <!-- NOMBRE -->
                    <div class="col-md-6 mb-3">
                        <label>Responsable de la interacción</label>
                        <select name="user_id" class="form-control select2" required>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{ $item->id == auth()->id() ? 'selected' : '' }}>
                                    {{ $item->name }} {{ $item->id == auth()->id() ? '(Tú)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- UBICACIÓN -->
                    <div class="form-group mb-3">
                        <label>Tipo</label>
                        <select class="form-control" name="tipo">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="llamada" {{ old('tipo') == 'llamada' ? 'selected' : '' }}>Llamada</option>
                            <option value="correo" {{ old('tipo') == 'correo' ? 'selected' : '' }}>Correo</option>
                            <option value="reunion" {{ old('tipo') == 'reunion' ? 'selected' : '' }}>Reunión</option>
                            <option value="mensaje" {{ old('tipo') == 'mensaje' ? 'selected' : '' }}>Mensaje</option>
                        </select>
                        @error('tipo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- TELÉFONO -->
                    <div class="form-group mb-3">
                        <label>Notas</label>
                        <textarea class="form-control" name="notas" rows="4"
                            placeholder="Escribe aquí las observaciones...">{{ old('notas') }}</textarea>
                        @error('notas')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- CORREO -->
                    <div class="form-group mb-3">
                        <label>Fecha de la interacción</label>
                        <input type="datetime-local" class="form-control" name="fecha_interaccion"
                            value="{{ old('fecha_interaccion', date('Y-m-d\TH:i')) }}">
                        @error('fecha_interaccion')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- BOTONES -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPT LIMPIO --}}
    <script>
        const switchWeb = document.getElementById('tieneWeb');
        const campoUrl = document.getElementById('campoUrl');
        const inputUrl = document.getElementById('inputUrl');

        switchWeb.addEventListener('change', function () {
            if (this.checked) {
                campoUrl.style.display = 'block';
                inputUrl.disabled = false;
                inputUrl.value = '';
            } else {
                campoUrl.style.display = 'none';
                inputUrl.disabled = false; // 🔥 IMPORTANTE
                inputUrl.value = 'Sin página';
            }
        });

        // estado inicial
        window.addEventListener('load', function () {
            inputUrl.value = 'Sin página';
            inputUrl.disabled = false;
        });
    </script>

@endsection