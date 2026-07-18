<!-- Modal -->
<div class="modal fade" id="addrequisito" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="{{ route('Requisito.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fa fa-clipboard-list me-2"></i>
                        Agregar Requisito
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    @include('layouts.componente.buscarproyecto')


                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Título del Requisito
                            </label>

                            <input type="text" class="form-control" name="titulo" placeholder="Ej: Integración PayPal"
                                required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea class="form-control" rows="4" name="descripcion"
                                placeholder="Describe el requerimiento..."></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Horas Estimadas
                            </label>

                            <input type="number" min="0" class="form-control" name="horas_estimadas"
                                id="horas_estimadas">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Valor Hora
                            </label>

                            <input type="number" min="0" class="form-control" name="valor_hora" id="valor_hora">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Costo Estimado
                            </label>

                            <input type="number" class="form-control bg-light" name="costo_estimado" id="costo_estimado"
                                readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Prioridad
                            </label>

                            <select class="form-select" name="prioridad">
                                <option value="Baja">Baja</option>
                                <option value="Media" selected>Media</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Estado
                            </label>

                            <select class="form-select" name="estado">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="En Progreso">En Progreso</option>
                                <option value="Completado">Completado</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-2"></i>
                        Guardar Requisito
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const horas = document.getElementById('horas_estimadas');
        const valor = document.getElementById('valor_hora');
        const costo = document.getElementById('costo_estimado');

        function calcularCosto() {
            let h = parseFloat(horas.value) || 0;
            let v = parseFloat(valor.value) || 0;

            costo.value = h * v;
        }

        horas.addEventListener('input', calcularCosto);
        valor.addEventListener('input', calcularCosto);

    });
</script>