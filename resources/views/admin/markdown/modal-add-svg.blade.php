<div class="modal fade"
     id="modalSvg"
     tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Crear SVG
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <input
                    type="text"
                    id="svgFilename"
                    class="form-control mb-3"
                    placeholder="Nombre archivo">

                <textarea
                    id="svgCode"
                    class="form-control"
                    rows="12"
                    placeholder="<svg>...</svg>"></textarea>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-primary"
                    id="saveSvg">

                    Guardar SVG

                </button>

            </div>

        </div>

    </div>

</div>
<script>

document
    .getElementById('saveSvg')
    .addEventListener('click', function () {

        fetch(`{{ route('markdown.svg.save') }}`, {

            method: 'POST',

            headers: {

                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .content,

                'Content-Type': 'application/json',

                'Accept': 'application/json'
            },

            body: JSON.stringify({

                filename: document
                    .getElementById('svgFilename')
                    .value,

                code: document
                    .getElementById('svgCode')
                    .value

            })

        })

        .then(response => response.json())

        .then(data => {

            if(data.success){

                location.reload();

            }

        });

    });

</script>