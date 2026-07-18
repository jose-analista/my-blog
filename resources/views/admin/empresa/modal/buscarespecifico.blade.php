<div class="modal fade" id="buscarunaempresaModal" tabindex="-1">

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
                <input class="form-control" type="text" id="busqueda" placeholder="Buscar empresas..."
                    onkeypress="if(event.key==='Enter'){buscar()}">


                <div id="infoEmpresa" style="margin-top:10px;"></div>


            </div>

            <div class="modal-footer">

                <button class="btn btn-success" onclick="buscar()">Buscar</button>


            </div>

        </div>

    </div>

</div>