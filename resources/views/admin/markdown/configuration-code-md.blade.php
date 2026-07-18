<div class="card-footer bg-light p-3">

    {{-- TOP BAR --}}
    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">

        <span id="wordCount" class="small text-muted">
            0 palabras
        </span>

        <span class="small text-muted">
            Markdown compatible
        </span>

        {{-- SELECT --}}
        <select id="headerSelector" class="form-select form-select-sm w-auto">

            <option value="">
                — Insertar Fragmento —
            </option>

            <option value="h1">Título H1</option>
            <option value="h2">Título H2</option>
            <option value="h3">Título H3</option>

            <option value="tabla">Tabla</option>

            <option value="texto_negrita">
                Texto negrita
            </option>

            <option value="texto_cursiva">
                Texto cursiva
            </option>

            <option value="texto_tachado">
                Texto tachado
            </option>

            <option value="texto_cita">
                Cita
            </option>

            <option value="lista_elemento">
                Lista de Elemento
            </option>

            <option value="lista_enumerada">
                Lista Enumerada
            </option>

            <option value="link">
                Link
            </option>

            <option value="image">
                Imagen
            </option>

            <option value="codigo_inline">
                Código inline
            </option>

            <option value="codigo_php">
                Código PHP
            </option>

            <option value="estilo_tabla">
                Estilo de tablas
            </option>

            <option value="mermaid_clase">
                Mermaid Clase
            </option>

            <option value="mermaid_flujo">
                Mermaid Flujo
            </option>

            <option value="mermaid_entidad_relacion">
                Mermaid ER
            </option>

        </select>
 {{-- IMÁGENES --}}
    <div class="d-flex flex-wrap gap-3">

       


            {{-- SELECT DE IMÁGENES --}}
            <select id="imageSelector" class="form-select form-select-sm w-auto">

                <option value="">
                    — Seleccionar Imagen —
                </option>

                @foreach ($imagenes as $imagen)

                    <option value="{{ asset('storage/img/' . $imagen->getFilename()) }}">
                        
                        {{ $imagen->getFilename() }}

                    </option>

                @endforeach

            </select>
   

    </div>
        {{-- BUTTON --}}
        <button type="button" id="insertSnippet" class="btn btn-sm btn-info text-white">

            <i class="fas fa-plus"></i>
            Insertar

        </button>
        

    </div>


   

</div>