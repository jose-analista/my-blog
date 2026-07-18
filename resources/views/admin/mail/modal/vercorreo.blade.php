<div class="modal fade"
     id="verCorreoModal{{ $email->id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">

                    <i class="fa fa-envelope-open me-2"></i>
                    Detalle del Correo

                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="card border-0 bg-light">

                            <div class="card-body">

                                <small class="text-muted">
                                    Destinatario
                                </small>

                                <h6 class="mb-0">
                                    {{ $email->destinatario }}
                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card border-0 bg-light">

                            <div class="card-body">

                                <small class="text-muted">
                                    Fecha
                                </small>

                                <h6 class="mb-0">
                                    {{ $email->created_at->format('d/m/Y H:i') }}
                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-12">

                        <div class="card border-0 bg-light">

                            <div class="card-body">

                                <small class="text-muted">
                                    Asunto
                                </small>

                                <h5 class="mb-0">
                                    {{ $email->asunto }}
                                </h5>

                            </div>

                        </div>

                    </div>

                    <div class="col-12">

                        <div class="card border-0">

                            <div class="card-header bg-light">

                                <strong>
                                    Mensaje
                                </strong>

                            </div>

                            <div class="card-body">

                                {!! nl2br(e($email->mensaje)) !!}

                            </div>

                        </div>

                    </div>

                    @if($email->archivo)

                    <div class="col-12">

                        <div class="alert alert-info border-0">

                            <i class="fa fa-paperclip me-2"></i>

                            Archivo adjunto:

                            <a href="{{ asset('storage/'.$email->archivo) }}"
                               target="_blank"
                               class="fw-bold">

                                Ver archivo

                            </a>

                        </div>

                    </div>

                    @endif

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Cerrar

                </button>

            </div>

        </div>

    </div>

</div>