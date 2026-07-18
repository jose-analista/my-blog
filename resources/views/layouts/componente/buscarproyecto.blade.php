{{-- BUSCADOR EN TIEMPO REAL DE PROYECTOS --}}

<div class="form-group mb-3">

    <label>Buscar Proyecto</label>

    {{-- INPUT BUSCADOR --}}
    <input type="text"
           id="buscarProyecto"
           class="form-control mb-2"
           placeholder="Escribe para buscar...">

    {{-- SELECT --}}
    <select name="proyecto_id"
            id="proyectoSelect"
            class="form-control"
            size="6">

        @foreach ($proyectos as $item)
            <option value="{{ $item->id }}">
                {{ $item->nombre }}
            </option>
        @endforeach

    </select>

</div>

<script>

document.getElementById('buscarProyecto').addEventListener('keyup', function () {

    let filtro = this.value.toLowerCase();

    let opciones = document.querySelectorAll('#proyectoSelect option');

    opciones.forEach(function(opcion) {

        let texto = opcion.textContent.toLowerCase();

        if (texto.includes(filtro)) {
            opcion.style.display = '';
        } else {
            opcion.style.display = 'none';
        }

    });

});

</script>