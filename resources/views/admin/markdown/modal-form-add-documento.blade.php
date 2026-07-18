{{-- MODAL PARA NUEVO DOCUMENTO --}}
<div class="modal fade" id="newDocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.markdown.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Archivo Markdown</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre del archivo</label>
                        <div class="input-group">
                            <input type="text" name="filename" class="form-control" placeholder="ejemplo-de-post"
                                required>
                            <span class="input-group-text">.md</span>
                        </div>
                        <small class="text-muted">No es necesario incluir la extensión.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear y Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>