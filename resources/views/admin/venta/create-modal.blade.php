<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header bg-dark text-white border-0">

                <div>
                    <h4 class="modal-title fw-bold mb-1 text-light" id="staticBackdropLabel">
                        Nueva Venta
                    </h4>

                    <small class="text-light opacity-75">
                        Registro de servicios y cliente
                    </small>
                </div>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body bg-light">

                <form action="{{ route('Venta.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                Información Cliente
                            </h5>

                            <div class="form-group">

                                <label class="fw-semibold mb-2">
                                    Cliente
                                </label>

                                <select name="cliente_id" class="form-control form-select rounded-3">

                                    <option value="">
                                        Seleccionar cliente
                                    </option>

                                    @foreach ($cliente as $item)

                                        <option value="{{ $item->id }}">
                                            {{ $item->nombre }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>
                    <div class="row">

                        {{-- EMPRESA --}}
                        <div class="col-md-6 mb-4">

                            <div class="form-group">

                                <label class="fw-semibold mb-2">
                                    Empresa
                                </label>

                                <select name="empresa_id" class="form-control form-select rounded-3">

                                    <option value="">
                                        Seleccionar empresa
                                    </option>

                                    @foreach ($empresa as $item)

                                        <option value="{{ $item->id }}">
                                            {{ $item->nombre }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        {{-- PROYECTO --}}
                        <div class="col-md-6 mb-4">

                            <div class="form-group">

                                <label class="fw-semibold mb-2">
                                    Proyecto
                                </label>

                                <select name="proyecto_id" class="form-control form-select rounded-3">

                                    <option value="">
                                        Seleccionar proyecto
                                    </option>

                                    @foreach ($proyecto as $item)

                                        <option value="{{ $item->id }}">
                                            {{ $item->nombre }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-3">

                        <h5 class="fw-bold mb-0">
                            Servicios
                        </h5>

                        <span class="badge bg-success px-3 py-2 rounded-pill">
                            Selecciona uno o más servicios
                        </span>

                    </div>

                    @foreach($servicios as $servicio)

                        <div class="card border-0 shadow-sm rounded-4 mb-3 servicio-card">

                            <div class="card-body">

                                <div class="row align-items-center">

                                    <div class="col-md-7">

                                        <div class="form-check">

                                            <input class="form-check-input servicio-checkbox" type="checkbox"
                                                name="servicios[]" value="{{ $servicio->id }}">

                                            <label class="form-check-label ms-2">

                                                <div class="fw-bold fs-6">
                                                    {{ $servicio->nombre }}
                                                </div>

                                                <small class="text-muted">
                                                    {{ $servicio->categoria }}
                                                </small>

                                            </label>

                                        </div>

                                    </div>

                                    <div class="col-md-3 mt-3 mt-md-0">

                                        <label class="small text-muted">
                                            Cantidad
                                        </label>

                                        <input type="number" name="cantidades[{{ $servicio->id }}]"
                                            class="form-control rounded-3" value="1" min="1">

                                    </div>

                                    <div class="col-md-2 text-md-end mt-3 mt-md-0">

                                        <div class="fw-bold text-success fs-5">

                                            ${{ number_format($servicio->tarifa_base, 0, ',', '.') }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                    <input type="hidden" name="precio" id="precioInput">

                    <div class="card border-0 bg-success text-white shadow-sm rounded-4 mt-4">

                        <div class="card-body text-center py-4">

                            <small class="text-uppercase opacity-75">
                                Total Venta
                            </small>

                            <h2 class="fw-bold mb-0 mt-2 text-light" id="totalVenta">

                                $0

                            </h2>

                        </div>

                    </div>

                    <div class="modal-footer border-0 mt-4 px-0">

                        <button type="button" class="btn btn-light border rounded-3 px-4" data-bs-dismiss="modal">

                            Cancelar

                        </button>

                        <button type="submit" class="btn btn-success rounded-3 px-5 fw-bold">

                            Registrar Venta

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const checkboxes = document.querySelectorAll('.servicio-checkbox');

        function calcularTotal() {

            let total = 0;

            checkboxes.forEach(function (checkbox) {

                if (checkbox.checked) {

                    const card = checkbox.closest('.servicio-card');

                    const cantidadInput = card.querySelector('input[type="number"]');

                    const cantidad = parseInt(cantidadInput.value) || 1;

                    const precioTexto = card.querySelector('.text-success').innerText;

                    const precio = parseInt(
                        precioTexto.replace(/\$/g, '')
                            .replace(/\./g, '')
                            .replace(/,/g, '')
                    );

                    total += precio * cantidad;
                }
            });

            document.getElementById('totalVenta').innerText =
                '$' + total.toLocaleString('es-CL');

            document.getElementById('precioInput').value = total;
        }

        checkboxes.forEach(function (checkbox) {

            checkbox.addEventListener('change', calcularTotal);

            const card = checkbox.closest('.servicio-card');

            const cantidadInput = card.querySelector('input[type="number"]');

            cantidadInput.addEventListener('input', calcularTotal);
        });

        calcularTotal();

    });

</script>