{{-- BUSCADOR EN TIEMPO REAL TIPO DATATABLES --}}

<div class="form-group mb-3">

    <label>Buscar Empresa</label>

    {{-- INPUT BUSCADOR --}}
    <input type="text"
           id="buscarEmpresa"
           class="form-control mb-2"
           placeholder="Escribe para buscar...">

    {{-- SELECT --}}
    <select name="empresa_id"
            id="empresaSelect"
            class="form-control"
            size="6">

        @foreach ($empresa as $item)
            <option value="{{ $item->id }}">
                {{ $item->nombre }}
            </option>
        @endforeach

    </select>

</div>

<script>

document.getElementById('buscarEmpresa').addEventListener('keyup', function () {

    let filtro = this.value.toLowerCase();

    let opciones = document.querySelectorAll('#empresaSelect option');

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