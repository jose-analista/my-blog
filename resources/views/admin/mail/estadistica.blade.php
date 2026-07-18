
    <!-- ESTADÍSTICAS -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted d-block">
                                Correos Enviados
                            </small>

                            <h2 class="fw-bold mb-0">
                                {{ $emails->where('estado','enviado')->count() }}
                            </h2>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="fa fa-paper-plane text-success fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted d-block">
                                Errores
                            </small>

                            <h2 class="fw-bold mb-0">
                                {{ $emails->where('estado','error')->count() }}
                            </h2>

                        </div>

                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                            <i class="fa fa-times text-danger fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted d-block">
                                Registros
                            </small>

                            <h2 class="fw-bold mb-0">
                                {{ $emails->total() }}
                            </h2>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="fa fa-envelope text-primary fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>