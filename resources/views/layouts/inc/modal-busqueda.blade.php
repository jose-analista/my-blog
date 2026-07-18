<!-- Modal -->
<div class="modal fade" id="exampleModalbuscar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="input-group">
                    <span class="input-group-text">Buscador</span>
                    <input type="text" aria-label="First name" class="form-control" id="buscador">
                  </div>
            </div>
            <div class="modal-body">
                  <ul id="listaArticulos">
                    <li class="articulo"><a href="{{ route('Empresa.index') }}">Empresas</a></li>
                    <li class="articulo"><a href="{{ route('Cliente.index') }}">Clientes</a></li>
                    <li class="articulo"><a href="{{ route('Contacto.index') }}">Contactos</a></li>
                    <li class="articulo"><a href="{{ route('Tecnologia.index') }}">Tecnologias</a></li>
                    <li class="articulo"><a href="{{ route('Venta.index') }}">Ventas</a></li>
                    <li class="articulo"><a href="{{ route('Fuentes.index') }}">Fuentes</a></li>
                                        <li class="articulo"><a href="{{ route('Proyecto.index') }}">Proyectos</a></li>
                    <li class="articulo"><a href="{{ route('Usuario.configuration', Auth::user()->id ) }}">Configuración</a></li>
                </ul>
                <p id="mensajeNoEncontrado" style="display: none; color: red;">No se encontraron resultados.</p>
            </div>
        </div>
    </div>
</div>
