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
                                <div class="card-title">Agregar Cliente</div>
                                <hr>
                                <form action="{{ route('Cliente.store') }}" method="post">
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
                                        <label for="input-2">A. Paterno</label>
                                        <input type="text" class="form-control" name="a_paterno">
                                        @error('a_paterno')
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
                                        <label for="input-2">A. Materno</label>
                                        <input type="text" class="form-control" name="a_materno">
                                        @error('a_materno')
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
                                        <label for="input-5">Cargo</label>
                                        <input type="text" class="form-control" name="cargo">
                                        @error('cargo')
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
                                        <label for="input-5">Red Social</label>
                                        <input type="text" class="form-control" name="red_social">
                                        <!-- @error('cargo')
                                        <small>
                                            <strong>
                                                <div class="alert alert-danger" role="alert">
                                                    Campo vacío
                                                </div>
                                            </strong>
                                        </small>
                                        @enderror -->
                                    </div>
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <div class="form-group">
                                        <label>Seleccionar Empresa</label>
                            <select name="empresa_id" class="form-control select2" style="width:100%">
    <option></option> <!-- importante para placeholder -->
    @foreach ($empresa as $item)
        <option value="{{ $item->id }}">
            {{ $item->nombre }} - {{ $item->rut }}
        </option>
    @endforeach
</select>
                                    </div>
                     <script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "🔍 Buscar empresa por nombre o RUT...",
        allowClear: true,
        width: '100%'
    });
});
</script>
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