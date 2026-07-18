<div class="modal fade" id="buscarsectorempresaModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Busqueda especifica
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">
                <div class="col-md-4">
                    <select id="sector" class="form-control">
                        <option value="">Seleccione un sector</option>

                        @foreach($sectores as $sector)
                            <option value="{{ $sector }}">
                                {{ $sector }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="resultadoSector" class="mt-3"></div>


            </div>

            <div class="modal-footer">


                <div class="col-md-2">
                    <button class="btn btn-success w-100" onclick="buscarSector()">
                        Buscar
                    </button>
                </div>

            </div>

        </div>

    </div>

</div>
<script>
    function buscarSector() {
        let sector = document.getElementById('sector').value;

        if (sector === '') {
            alert('Seleccione un sector');
            return;
        }

        fetch('{{ route("Buscar.sector") }}?sector=' + encodeURIComponent(sector))
            .then(response => {

                if (!response.ok) {
                    throw new Error('Error HTTP: ' + response.status);
                }

                return response.json();
            })
            .then(data => {

                let html = '';

                if (data.length === 0) {

                    html = `
                <div class="alert alert-warning">
                    No se encontraron empresas para este sector.
                </div>
            `;

                } else {

                    html = `<div class="row">`;

                    data.forEach(empresa => {

                        html += `
        <div class="col-md-6 col-lg-4 mb-3">

            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">

                    <h5 class="card-title">
                        🏢 ${empresa.nombre ?? 'Sin nombre'}
                    </h5>

                    <p class="mb-1">
                        📍 ${empresa.ubicacion ?? 'Sin ubicación'}
                    </p>

                    <p class="mb-1">
                        📞 ${empresa.fono ?? 'Sin teléfono'}
                    </p>

                    <p class="mb-2">
                        ✉️ ${empresa.correo ?? 'Sin correo'}
                    </p>

                    <div class="d-flex flex-wrap gap-2">

                        ${empresa.url
                                ? `
                            <a href="${empresa.url}"
                               target="_blank"
                               class="btn btn-sm btn-primary">
                                🌐 Sitio Web
                            </a>
                            `
                                : ''
                            }

                        ${empresa.fono
                                ? `
                            <a href="https://wa.me/${empresa.fono.replace(/\D/g, '')}"
                               target="_blank"
                               class="btn btn-sm btn-success">
                                WhatsApp
                            </a>
                            `
                                : ''
                            }

                    </div>

                </div>

                <div class="card-footer bg-light">
                    <small class="text-muted">
                        ${empresa.razon_social ?? ''}
                    </small>
                </div>

            </div>

        </div>
    `;
                    });

                    html += `</div>`;
                }

                document.getElementById('resultadoSector').innerHTML = html;

            })
            .catch(error => {

                console.error(error);

                document.getElementById('resultadoSector').innerHTML = `
            <div class="alert alert-danger">
                Error al consultar empresas.
            </div>
        `;

            });
    }
</script>