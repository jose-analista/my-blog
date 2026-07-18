<div class="modal fade" id="deleterequisito" tabindex="-1">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="formEliminar" method="POST">

                @csrf
                @method('DELETE')

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title">
                        Eliminar Requisito
                    </h5>

                </div>

                <div class="modal-body">

                    <p>
                        ¿Deseas eliminar el requisito?
                    </p>

                    <strong id="nombreRequisito"></strong>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button type="submit"
                            class="btn btn-danger">

                        Eliminar

                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btnEliminar').forEach(function(btn) {

        btn.addEventListener('click', function() {

            let id = this.dataset.id;
            let titulo = this.dataset.titulo;

            document.getElementById('nombreRequisito').textContent = titulo;

            document.getElementById('formEliminar').action =
                "{{ route('Requisito.destroy', ':id') }}"
                .replace(':id', id);

        });

    });

});

</script>