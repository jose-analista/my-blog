<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Fuentes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Agregar Fuente</div>
                                <hr>
                                <form action="{{ route('Fuentes.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="input-2">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre">
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
                                        <label for="input-3">Tipo</label>
                                        <input type="text" class="form-control" name="tipo" id="tipo">
                                        <!-- @error('ubicacion')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror -->
                                    </div>
                                    <div class="form-group">
                                        <label for="input-4">Url</label>
                                        <input type="text" class="form-control" name="url" id="url">
                                        <!-- @error('fono')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror -->
                                    </div>
                                    <div class="form-group">
                                        <label for="input-5">Nicho</label>
                                        <input type="text" class="form-control" name="nicho" id="nicho">
                                        <!-- @error('correo')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror -->
                                    </div>
                                    <div class="form-group">
                                        <label for="input-5">Descripción</label>
                                         <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                        placeholder="Describe aquí..."></textarea> 
                                        <!-- @error('razon_social')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror -->
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

