<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Agregar Proyecto</div>
                                <hr>
                                <form action="{{ route('Proyecto.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
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
                                        <label for="input-2">Enlace de acceso</label>
                                        <input type="text" class="form-control" name="link">
                                        @error('link')
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
                                        <label for="input-2">Estado</label>
                                        <input type="checkbox" name="estado" /> <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-3">Descripción</label>
                                        <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
                                        @error('descripcion')
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
                                        @include('layouts.componente.buscar-empresa')
                                        @error('empresa_id')
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
                                        <label for="input-5">Imagen</label>
                                        <input type="file" class="form-control" name="imagen">
                                        @error('imagen')
                                            <small>
                                                <strong>
                                                    <div class="alert alert-danger" role="alert">
                                                        Tipo de archivo no compatible con la imágenes
                                                    </div>
                                                </strong>
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="input-5">Documento</label>
                                        <input type="file" class="form-control" name="documento">
                                        @error('documento')
                                            <small>
                                                <strong>
                                                    <div class="alert alert-danger" role="alert">
                                                        El docuemto no se pudo subir
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
