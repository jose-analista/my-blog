<div class="modal fade" id="modalenviarcorreo" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    <i class="fa fa-envelope me-2"></i>
                    Enviar Correo
                </h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                </button>

            </div>

            <form action="{{ route('correo.enviar') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                @include('layouts.componente.buscar-empresa')

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Destinatario
                        </label>

                        <input type="email" name="correo" class="form-control" placeholder="cliente@correo.com"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Asunto
                        </label>

                        <input type="text" name="asunto" class="form-control" placeholder="Ingrese el asunto" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Archivo adjunto
                        </label>

                        <input type="file" name="archivo" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Mensaje
                        </label>

                        <textarea name="mensaje" rows="8" class="form-control"
                            placeholder="Escriba el contenido del correo..." required></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button type="submit" class="btn btn-primary">

                        <i class="fa fa-paper-plane me-2"></i>
                        Enviar Correo

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>