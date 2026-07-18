<div class="modal fade" id="buscarnichofuenteModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Búsqueda por Nicho
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <select id="nichofuente" class="form-control mb-3">
                    <option value="">Seleccione un nicho</option>

                    @foreach($nichos as $nicho)
                        <option value="{{ $nicho }}">
                            {{ $nicho }}
                        </option>
                    @endforeach

                </select>

                <div id="resultadoNicho"></div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-success"
                        onclick="buscarNicho()">
                    Buscar
                </button>

            </div>

        </div>

    </div>

</div>

<script>

function buscarNicho()
{
    let nicho = document.getElementById('nichofuente').value;

    console.log('Nicho seleccionado:', nicho);

    if(!nicho){
        alert('Seleccione un nicho');
        return;
    }

    fetch('{{ route("Fuentes.buscarNicho") }}?nicho=' + encodeURIComponent(nicho))

    .then(response => {

        if(!response.ok){
            throw new Error('Error HTTP ' + response.status);
        }

        return response.json();

    })

    .then(data => {

        let html = '';

        if(data.length === 0){

            html = `
                <div class="alert alert-warning">
                    No hay fuentes para este nicho.
                </div>
            `;

        }else{

            data.forEach(fuente => {

                html += `
                    <div class="card mb-3 shadow-sm">

                        <div class="card-body">

                            <h5 class="card-title">
                                ${fuente.nombre ?? ''}
                            </h5>

                            <span class="badge bg-primary mb-2">
                                ${fuente.tipo ?? ''}
                            </span>

                            <p class="mb-2">
                                ${fuente.descripcion ?? ''}
                            </p>

                            <p class="mb-2">
                                <strong>Nicho:</strong>
                                ${fuente.nicho ?? ''}
                            </p>

                            <a href="${fuente.url}"
                               target="_blank"
                               class="btn btn-success">
                                Visitar sitio
                            </a>

                        </div>

                    </div>
                `;

            });

        }

        document.getElementById('resultadoNicho').innerHTML = html;

    })

    .catch(error => {

        console.error(error);

        document.getElementById('resultadoNicho').innerHTML = `
            <div class="alert alert-danger">
                Error al cargar las fuentes.
            </div>
        `;

    });
}

</script>