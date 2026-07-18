<!-- Modal -->
<div class="modal fade" id="observacionModalservicio{{ $item->id }}" tabindex="-1"
    aria-labelledby="descripcionModalLabel{{ $item->id }}" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="descripcionModalLabel{{ $item->id }}">
                    Observaciones de servicio
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>

            </div>

            <div class="modal-body">

                {{ $item->exclusiones }}

            </div>

            <div class="modal-footer">



            </div>

        </div>

    </div>

</div>