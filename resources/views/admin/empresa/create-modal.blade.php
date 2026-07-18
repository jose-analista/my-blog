<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Agregar Empresa</div>
                                <hr>
                                <form action="{{ route('Empresa.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="input-1">Rut</label>
                                        <input type="text" class="form-control" name="rut">
                                        @error('rut')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-2">Nombre</label>
                                        <input type="text" class="form-control" name="nombre">
                                        @error('nombre')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-3">Ubicación</label>
                                        <input type="text" class="form-control" name="ubicacion">
                                        @error('ubicacion')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-4">Teléfono</label>
                                        <input type="text" class="form-control" name="fono">
                                        @error('fono')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-5">Correo</label>
                                        <input type="email" class="form-control" name="correo">
                                        @error('correo')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
    <label>Tiene página web?</label><br>
    <input type="checkbox" id="tieneWeb"> Sí
</div>

<div class="form-group" id="campoUrl" style="display: none;">
    <label for="input-5">URL</label>
    <input type="text" class="form-control" name="url" id="inputUrl">
</div>

<script>
    const switchWeb = document.getElementById('tieneWeb');
    const campoUrl = document.getElementById('campoUrl');
    const inputUrl = document.getElementById('inputUrl');

    switchWeb.addEventListener('change', function () {
        if (this.checked) {
            // Tiene página web
            campoUrl.style.display = 'block';
            inputUrl.disabled = false;
            inputUrl.value = '';
        } else {
            // NO tiene página web
            campoUrl.style.display = 'none';
            inputUrl.value = 'Sin página';
            inputUrl.disabled = true;
        }
    });

    // Estado inicial (por si carga desmarcado)
    window.addEventListener('load', function () {
        if (!switchWeb.checked) {
            inputUrl.value = 'Sin página';
            inputUrl.disabled = true;
        }
    });
</script>
                                    <div class="form-group">
                                        <label for="input-5">Razón Social</label>
                                        <input type="text" class="form-control" name="razon_social">
                                        @error('razon_social')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-success px-5"><i class="icon-lock"></i>
                                            Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>