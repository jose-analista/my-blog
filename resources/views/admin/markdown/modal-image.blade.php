<!-- Modal -->
<div class="modal fade" id="modalimagen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                    Galería de Imágenes
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>


            {{-- BODY --}}
            <div class="modal-body">

                <div class="container-fluid">

                    <div class="row g-3">

                        @foreach ($imagenes as $imagen)

                            <div class="col-12 mb-4">

                                <div class="card shadow-sm border-0">

                                    <div class="row g-0">

                                        {{-- IMAGEN --}}
                                        <div class="col-md-4 position-relative">

                                            {{-- ELIMINAR --}}
                                            <button type="button"
                                                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle delete-image"
                                                data-image="{{ $imagen->getFilename() }}" style="
                                width:32px;
                                height:32px;
                                z-index:10;
                                padding:0;
                            ">

                                                <img src="{{ asset('img/icon/delete.svg') }}" width="25" height="25">

                                            </button>


                                            <img src="{{ asset('storage/img/' . $imagen->getFilename()) }}"
                                                class="img-fluid rounded-start w-100" style="
                                height:250px;
                                object-fit:cover;
                            ">

                                        </div>


                                        {{-- EDITOR --}}
                                        <div class="col-md-8">

                                            <div class="card-body">

                                                {{-- NOMBRE --}}
                                                <h6 class="mb-3">

                                                    {{ $imagen->getFilename() }}

                                                </h6>


                                                {{-- TEXTAREA SVG --}}
                                                <textarea class="form-control svg-editor" rows="12"
                                                    data-image="{{ $imagen->getFilename() }}">{{ File::get(storage_path('app/public/img/' . $imagen->getFilename())) }}</textarea>


                                                {{-- BOTONES --}}
                                                <div class="d-flex gap-2 mt-3">

                                                    {{-- GUARDAR --}}
                                                    <button type="button" class="btn btn-success save-svg"
                                                        data-image="{{ $imagen->getFilename() }}">

                                                        Guardar

                                                    </button>


                                                

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<script>

    document.querySelectorAll('.delete-image').forEach(button => {

        button.addEventListener('click', function () {

            const filename = this.dataset.image;

            const card = this.closest('.col-6');

            if (!confirm(`Eliminar ${filename}?`)) {
                return;
            }

            let url = `{{ route('markdown.image.delete', ':filename') }}`;

            url = url.replace(':filename', filename);

            fetch(url, {

                method: 'DELETE',

                headers: {

                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .content,

                    'Accept': 'application/json'

                }

            })

                .then(response => response.json())

                .then(data => {

                    if (data.success) {

                        card.remove();

                    } else {

                        alert(data.message);

                    }

                })

                .catch(error => {

                    console.error(error);

                });

        });

    });

</script>

<script>

document.querySelectorAll('.save-svg').forEach(button => {

    button.addEventListener('click', function () {

        const filename = this.dataset.image;

        const textarea = document.querySelector(
            `.svg-editor[data-image="${filename}"]`
        );

        const code = textarea.value;

        let url = `{{ route('markdown.svg.update', ':filename') }}`;

        url = url.replace(':filename', filename);

        fetch(url, {

            method: 'PUT',

            headers: {

                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .content,

                'Content-Type': 'application/json',

                'Accept': 'application/json'

            },

            body: JSON.stringify({
                code: code
            })

        })

        .then(response => response.json())

        .then(data => {

            if(data.success){

                alert('SVG actualizado');

            }

        });

    });

});

</script>