<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
    <h6 class="mb-0">
        <i class="fas fa-code me-2 text-info"></i>
        <span class="text-light fw-normal">{{ $filename }}</span>
    </h6>

    <div class="d-flex align-items-center">

        <div class="form-check form-switch me-3 text-light">
            <input class="form-check-input" type="checkbox" id="togglePreview" checked>
            <label class="form-check-label small" for="togglePreview">Ver Código</label>
        </div>
       

        {{-- BOTÓN CAMBIAR NOMBRE --}}
        <button type="button" class="btn btn-sm btn-outline-info border-0 me-2" data-bs-toggle="modal"
            data-bs-target="#renameModal">
            <i class="fas fa-edit me-1"></i> Renombrar
        </button>
        <button type="submit" class="btn btn-sm btn-success px-3">
            <i class="fas fa-save me-1"></i> Guardar
        </button>

    </div>

</div>