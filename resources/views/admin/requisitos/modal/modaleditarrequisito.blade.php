<div class="modal fade" id="editrequisito" tabindex="-1">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="formEditar" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header bg-warning">
                    <h5 class="modal-title">
                        Editar Requisito
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Proyecto</label>

                        <select name="proyecto_id"
                                id="edit_proyecto_id"
                                class="form-select">

                            @foreach($proyectos as $proyecto)

                                <option value="{{ $proyecto->id }}">
                                    {{ $proyecto->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">
                        <label>Título</label>

                        <input type="text"
                               name="titulo"
                               id="edit_titulo"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Descripción</label>

                        <textarea
                            name="descripcion"
                            id="edit_descripcion"
                            class="form-control"
                            rows="4"></textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <label>Horas</label>

                            <input type="number"
                                   name="horas_estimadas"
                                   id="edit_horas"
                                   class="form-control">

                        </div>

                        <div class="col-md-4">

                            <label>Valor Hora</label>

                            <input type="number"
                                   name="valor_hora"
                                   id="edit_valor"
                                   class="form-control">

                        </div>

                        <div class="col-md-4">

                            <label>Costo</label>

                            <input type="number"
                                   id="edit_costo"
                                   class="form-control"
                                   readonly>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-6">

                            <label>Prioridad</label>

                            <select name="prioridad"
                                    id="edit_prioridad"
                                    class="form-select">

                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label>Estado</label>

                            <select name="estado"
                                    id="edit_estado"
                                    class="form-select">

                                <option value="Pendiente">Pendiente</option>
                                <option value="En Progreso">En Progreso</option>
                                <option value="Completado">Completado</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit"
                            class="btn btn-warning">

                        Actualizar

                    </button>

                </div>

            </form>

        </div>
    </div>

</div>