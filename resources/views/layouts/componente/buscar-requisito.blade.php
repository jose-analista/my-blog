<div class="form-group mb-3">

    <label>Buscar Requisito</label>

    <!-- BUSCADOR -->
    <input type="text"
           id="buscarRequisito"
           class="form-control mb-2"
           placeholder="Escribe para buscar un requisito...">

    <!-- SELECT -->
   <select name="requisito_id"
        id="requisito_id"
        class="form-control select2">

    @foreach($requisitos as $item)
        <option value="{{ $item->id }}">
            {{ $item->titulo }}
            | Prioridad: {{ ucfirst($item->prioridad) }}
            | Estado: {{ $item->estado }}
        </option>
    @endforeach

</select>

</div>

<script>
document.getElementById('buscarRequisito').addEventListener('keyup', function () {

    let filtro = this.value.toLowerCase();

    let opciones = document.querySelectorAll('#requisitoSelect option');

    opciones.forEach(function(opcion) {

        let texto = opcion.textContent.toLowerCase();

        opcion.style.display = texto.includes(filtro)
            ? ''
            : 'none';

    });

});
</script>