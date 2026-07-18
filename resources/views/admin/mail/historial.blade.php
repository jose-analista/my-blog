<!-- HISTORIAL -->
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">
                Historial de Correos
            </h5>

            <span class="badge bg-primary">
                {{ $emails->total() }} registros
            </span>

        </div>

    </div>

    <div class="card-body p-0">

        @forelse($emails as $email)

            <div class="border-bottom p-3">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center">

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">

                            <i class="fa fa-envelope text-primary"></i>

                        </div>

                        <div>

                            <h6 class="mb-1 fw-semibold">
                                {{ $email->asunto }}
                            </h6>

                            <small class="text-muted">
                                {{ $email->destinatario }}
                            </small>

                        </div>

                    </div>

                    <div class="text-end">

                        @if($email->estado == 'enviado')

                            <span class="badge bg-success">
                                Enviado
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Error
                            </span>

                        @endif

                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#verCorreoModal{{ $email->id }}">

                            Ver Detalle

                        </button>

                        <div class="small text-muted mt-1">
                            {{ $email->created_at->format('d/m/Y H:i') }}
                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="text-center py-5">

                <i class="fa fa-envelope-open fa-4x text-muted mb-3"></i>

                <h5>
                    No hay correos registrados
                </h5>

                <p class="text-muted">
                    Los correos enviados aparecerán aquí.
                </p>

            </div>

        @endforelse

    </div>

    @if($emails->count())

        <div class="card-footer bg-white border-0">

            {{ $emails->links() }}

        </div>

    @endif

</div>