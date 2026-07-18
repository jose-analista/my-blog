@extends ('layouts.inc.admin')

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Agregar Oportunidad</h4>
            <hr>

            <form action="{{ route('Oportunidad.store') }}" method="post">
                @csrf
                @include('layouts.componente.buscar-empresa')
                <!-- NOMBRE -->
                <div class="form-group mb-3">
                    <label>Título</label>
                    <input type="text" class="form-control" name="titulo">
                    @error('titulo')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- UBICACIÓN -->
                <div class="form-group mb-3">
                    <label>Valor estimado</label>
                    <input type="text" class="form-control" name="valor_estimado">
                    @error('valor_estimado')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- TELÉFONO -->
                <div class="form-group mb-3">
                    <label>Etapa</label>
                    <select class="form-control" name="etapa">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="prospeccion" {{ old('etapa') == 'prospeccion' ? 'selected' : '' }}>prospeccion
                        </option>
                        <option value="propuesta" {{ old('etapa') == 'propuesta' ? 'selected' : '' }}>propuesta</option>
                        <option value="negociacion" {{ old('etapa') == 'negociacion' ? 'selected' : '' }}>negociacion
                        </option>
                        <option value="ganada" {{ old('etapa') == 'ganada' ? 'selected' : '' }}>ganada</option>
                        <option value="perdida" {{ old('etapa') == 'perdida' ? 'selected' : '' }}>perdida</option>
                    </select>
                    @error('etapa')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>

                <!-- CORREO -->
                <div class="form-group mb-3">
                    <label>Fecha de cierre estimada</label>
                    <input type="date" class="form-control" name="fecha_cierre_estimada">
                    @error('correo')
                        <div class="alert alert-danger mt-1">Campo vacío</div>
                    @enderror
                </div>


                <!-- Descripción -->
                <div class="form-group mb-3">
                    <label>Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                        placeholder="Describe aquí..."></textarea> 
                </div>

                <!-- BOTONES -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection