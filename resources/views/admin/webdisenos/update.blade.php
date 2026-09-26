@extends('layouts.inc.admin')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h4>
                        Actualizar Diseño

                        <a href="{{ route('Diseno.index') }}" class="btn btn-primary float-end">
                            Volver
                        </a>
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('Diseno.update', $diseno->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        @method("PUT")

                        <div class="row">

                            {{-- NOMBRE --}}

                            <div class="col-md-6 mb-3">

                                <label>Nombre</label>

                                <input type="text" name="nombre" class="form-control"
                                    value="{{ old('nombre', $diseno->nombre) }}" required />

                                @error('nombre')

                                    <small>
                                        <strong>
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        </strong>
                                    </small>

                                @enderror

                            </div>


                            {{-- CATEGORÍA --}}

                            <div class="col-md-6 mb-3">

                                <label>Categoría</label>

                                <input type="text" name="categoria" class="form-control"
                                    value="{{ old('categoria', $diseno->categoria) }}"
                                    placeholder="Ej: Landing Page, Ecommerce, Dashboard" />

                                @error('categoria')

                                    <small>
                                        <strong>
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        </strong>
                                    </small>

                                @enderror

                            </div>


                            {{-- DESCRIPCIÓN --}}

                            <div class="col-md-12 mb-3">

                                <label>Descripción</label>

                                <textarea name="descripcion" rows="4" class="form-control"
                                    placeholder="Descripción del diseño">{{ old('descripcion', $diseno->descripcion) }}</textarea>

                                @error('descripcion')

                                    <small>
                                        <strong>
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        </strong>
                                    </small>

                                @enderror

                            </div>

                            <style>
                                .codigo-wrapper {
                                    background: #020617;
                                    border: 1px solid #1e293b;
                                    border-radius: 14px;
                                    overflow: hidden;
                                    box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
                                }

                                .codigo-toolbar {
                                    height: 46px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 0 14px;
                                    background: #0f172a;
                                    border-bottom: 1px solid #1e293b;
                                }

                                .codigo-left {
                                    display: flex;
                                    align-items: center;
                                    gap: 10px;
                                }

                                .codigo-dots {
                                    display: flex;
                                    gap: 6px;
                                }

                                .codigo-dot {
                                    width: 10px;
                                    height: 10px;
                                    border-radius: 50%;
                                    background: #475569;
                                }

                                .codigo-file {
                                    color: #cbd5e1;
                                    font-family: monospace;
                                    font-size: 13px;
                                }

                                .codigo-language {
                                    color: #64748b;
                                    font-size: 12px;
                                    font-family: monospace;
                                }

                                .codigo-actions {
                                    display: flex;
                                    gap: 6px;
                                }

                                .codigo-btn {
                                    border: 1px solid #334155;
                                    background: #1e293b;
                                    color: #cbd5e1;
                                    border-radius: 6px;
                                    padding: 5px 9px;
                                    font-size: 12px;
                                    cursor: pointer;
                                    transition: .2s;
                                }

                                .codigo-btn:hover {
                                    background: #334155;
                                    color: white;
                                }

                                .codigo-editor-area {
                                    position: relative;
                                }

                                .codigo-editor {
                                    width: 100%;
                                    min-height: 520px;
                                    display: block;

                                    padding: 20px;

                                    background: #020617;
                                    color: #e2e8f0;

                                    border: 0;
                                    outline: none;
                                    resize: vertical;

                                    font-family:
                                        "JetBrains Mono",
                                        "Fira Code",
                                        "Cascadia Code",
                                        Consolas,
                                        monospace;

                                    font-size: 14px;
                                    line-height: 1.8;

                                    letter-spacing: .1px;

                                    tab-size: 4;

                                    white-space: pre;

                                    overflow: auto;
                                }

                                .codigo-editor::selection {
                                    background: rgba(59, 130, 246, .35);
                                }

                                .codigo-editor::placeholder {
                                    color: #475569;
                                }

                                .codigo-editor::-webkit-scrollbar {
                                    width: 10px;
                                    height: 10px;
                                }

                                .codigo-editor::-webkit-scrollbar-track {
                                    background: #020617;
                                }

                                .codigo-editor::-webkit-scrollbar-thumb {
                                    background: #334155;
                                    border-radius: 10px;
                                }

                                .codigo-editor::-webkit-scrollbar-thumb:hover {
                                    background: #475569;
                                }

                                .codigo-footer {
                                    height: 32px;

                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;

                                    padding: 0 14px;

                                    background: #0f172a;

                                    border-top: 1px solid #1e293b;

                                    color: #64748b;

                                    font-family: monospace;
                                    font-size: 11px;
                                }

                                .codigo-status {
                                    display: flex;
                                    align-items: center;
                                    gap: 7px;
                                }

                                .status-dot {
                                    width: 7px;
                                    height: 7px;

                                    border-radius: 50%;

                                    background: #22c55e;

                                    box-shadow:
                                        0 0 7px rgba(34, 197, 94, .6);
                                }

                                .status-modificado {
                                    background: #f59e0b;
                                    box-shadow:
                                        0 0 7px rgba(245, 158, 11, .6);
                                }
                            </style>


                            <div class="col-md-12 mb-3">

                                <label class="form-label fw-semibold">
                                    Código
                                </label>

                                <div class="codigo-wrapper" id="editorCodigo">

                                    <!-- TOOLBAR -->
                                    <div class="codigo-toolbar">

                                        <div class="codigo-left">

                                            <div class="codigo-dots">
                                                <span class="codigo-dot"></span>
                                                <span class="codigo-dot"></span>
                                                <span class="codigo-dot"></span>
                                            </div>

                                            <span class="codigo-file">
                                                index.html
                                            </span>

                                        </div>


                                        <div class="codigo-actions">

                                            <!-- FORMATEAR -->

                                            <button type="button" class="codigo-btn" id="btnFormatear"
                                                title="Formatear código (Ctrl + Shift + F)">
                                                ✨ Formatear
                                            </button>


                                            <!-- COPIAR -->

                                            <button type="button" class="codigo-btn" id="btnCopiar">
                                                📋 Copiar
                                            </button>


                                            <!-- GUARDAR -->

                                            <button type="button" class="codigo-btn" id="btnGuardar">
                                                💾 Guardar
                                            </button>


                                            <!-- FULLSCREEN -->

                                            <button type="button" class="codigo-btn" id="btnFullscreen">
                                                ⛶
                                            </button>

                                        </div>

                                    </div>


                                    <!-- EDITOR -->
                                    <div class="codigo-editor-area">

                                        <textarea name="codigo" id="codigo" rows="20" class="codigo-editor"
                                            spellcheck="false"
                                            placeholder="Ingresa aquí tu código HTML/Tailwind">{{ old('codigo', $diseno->codigo) }}</textarea>

                                    </div>


                                    <!-- FOOTER -->
                                    <div class="codigo-footer">

                                        <div class="codigo-status">

                                            <span class="status-dot" id="statusDot">
                                            </span>

                                            <span id="statusTexto">
                                                Editor listo
                                            </span>

                                        </div>


                                        <div>

                                            <span id="contadorLineas">
                                                1 línea
                                            </span>

                                            &nbsp; | &nbsp;

                                            <span id="contadorCaracteres">
                                                0 caracteres
                                            </span>

                                            &nbsp; | &nbsp;

                                            UTF-8

                                        </div>

                                    </div>

                                </div>


                                @error('codigo')

                                    <div class="alert alert-danger mt-2">

                                        <strong>
                                            {{ $message }}
                                        </strong>

                                    </div>

                                @enderror

                            </div>


                            <script>

                                document.addEventListener('DOMContentLoaded', function () {

                                    const editor = document.getElementById('codigo');
                                    const btnFormatear =
                                        document.getElementById('btnFormatear');

                                    const btnCopiar = document.getElementById('btnCopiar');

                                    const btnGuardar = document.getElementById('btnGuardar');

                                    const btnFullscreen = document.getElementById('btnFullscreen');

                                    const statusTexto = document.getElementById('statusTexto');

                                    const statusDot = document.getElementById('statusDot');

                                    const contadorLineas = document.getElementById('contadorLineas');

                                    const contadorCaracteres =
                                        document.getElementById('contadorCaracteres');

                                    const editorWrapper =
                                        document.getElementById('editorCodigo');


                                    /*
                                    |--------------------------------------------------------------------------
                                    | CONTADORES
                                    |--------------------------------------------------------------------------
                                    */

                                    function actualizarContadores() {

                                        const codigo = editor.value;

                                        const lineas = codigo.length === 0
                                            ? 1
                                            : codigo.split('\n').length;

                                        const caracteres = codigo.length;

                                        contadorLineas.textContent =
                                            lineas + (lineas === 1 ? ' línea' : ' líneas');

                                        contadorCaracteres.textContent =
                                            caracteres + ' caracteres';
                                    }
                                    /* =========================================================
                                       FORMATEAR CÓDIGO
                                       ---------------------------------------------------------
                                       Utilizamos Prettier para organizar automáticamente
                                       el HTML del editor.

                                       Esto es especialmente útil cuando pegas diseños
                                       completos de HTML + Tailwind.
                                    ========================================================= */

                                    async function formatearCodigo() {

                                        const codigoActual = editor.value;


                                        /* -----------------------------------------------------
                                           No hacemos nada si el editor está vacío.
                                        ----------------------------------------------------- */

                                        if (!codigoActual.trim()) {

                                            statusTexto.textContent =
                                                'No hay código para formatear';

                                            return;
                                        }


                                        /* -----------------------------------------------------
                                           Cambiamos el estado mientras trabaja Prettier.
                                        ----------------------------------------------------- */

                                        statusTexto.textContent =
                                            'Formateando...';


                                        try {

                                            const codigoFormateado =
                                                await prettier.format(

                                                    codigoActual,

                                                    {

                                                        /*
                                                         * HTML es el parser correcto para
                                                         * diseños Tailwind porque Tailwind
                                                         * se encuentra dentro de class=""
                                                         */

                                                        parser: 'html',

                                                        plugins: prettierPlugins,

                                                        /*
                                                         * Ancho máximo de línea.
                                                         */

                                                        printWidth: 100,

                                                        /*
                                                         * 4 espacios por nivel.
                                                         */

                                                        tabWidth: 4,

                                                        /*
                                                         * Usamos espacios y no tabs.
                                                         */

                                                        useTabs: false,

                                                        /*
                                                         * Mantener estructura HTML legible.
                                                         */

                                                        bracketSameLine: false,

                                                        /*
                                                         * Importante para HTML.
                                                         */

                                                        htmlWhitespaceSensitivity: 'css'

                                                    }

                                                );


                                            /* -------------------------------------------------
                                               Reemplazamos el código original.
                                            ------------------------------------------------- */

                                            editor.value =
                                                codigoFormateado;


                                            /* -------------------------------------------------
                                               Actualizamos interfaz.
                                            ------------------------------------------------- */

                                            statusTexto.textContent =
                                                '✓ Código formateado';


                                            statusDot.classList.remove(
                                                'status-modificado'
                                            );


                                            actualizarContadores();


                                            /*
                                             * Después de un momento volvemos al estado normal.
                                             */

                                            setTimeout(() => {

                                                statusTexto.textContent =
                                                    'Editor listo';

                                            }, 2000);


                                        } catch (error) {

                                            console.error(
                                                'Error al formatear:',
                                                error
                                            );


                                            statusTexto.textContent =
                                                '⚠ Error de sintaxis';


                                            alert(
                                                'No se pudo formatear el HTML.\n\n' +
                                                'Revisa que no existan etiquetas HTML incompletas.'
                                            );

                                        }

                                    }

                                    /*
                                    |--------------------------------------------------------------------------
                                    | ESTADO
                                    |--------------------------------------------------------------------------
                                    */

                                    function modificarEstado() {

                                        statusTexto.textContent = 'Modificado';

                                        statusDot.classList.add('status-modificado');
                                        statusTexto.textContent =
                                            '✓ Código formateado';

                                        statusDot.classList.remove(
                                            'status-modificado'
                                        );

                                        actualizarContadores();
                                    }


                                    /*
                                    |--------------------------------------------------------------------------
                                    | COPIAR
                                    |--------------------------------------------------------------------------
                                    */

                                    btnCopiar.addEventListener('click', async function () {

                                        try {

                                            await navigator.clipboard.writeText(
                                                editor.value
                                            );

                                            statusTexto.textContent = 'Código copiado';

                                            setTimeout(() => {

                                                statusTexto.textContent = 'Editor listo';

                                            }, 1500);

                                        } catch (error) {

                                            editor.select();

                                            document.execCommand('copy');

                                            statusTexto.textContent = 'Código copiado';

                                        }

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | GUARDAR LOCALMENTE
                                    |--------------------------------------------------------------------------
                                    */

                                    btnGuardar.addEventListener('click', function () {

                                        localStorage.setItem(
                                            'codigo_editor',
                                            editor.value
                                        );

                                        statusTexto.textContent =
                                            'Guardado localmente';

                                        statusDot.classList.remove(
                                            'status-modificado'
                                        );

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | RECUPERAR GUARDADO
                                    |--------------------------------------------------------------------------
                                    */

                                    const codigoGuardado =
                                        localStorage.getItem('codigo_editor');

                                    if (
                                        codigoGuardado &&
                                        editor.value.trim() === ''
                                    ) {

                                        editor.value = codigoGuardado;

                                    }


                                    /*
                                    |--------------------------------------------------------------------------
                                    | CAMBIOS
                                    |--------------------------------------------------------------------------
                                    */

                                    editor.addEventListener('input', function () {

                                        modificarEstado();

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | TAB
                                    |--------------------------------------------------------------------------
                                    */

                                    editor.addEventListener('keydown', function (event) {

                                        if (event.key === 'Tab') {

                                            event.preventDefault();

                                            const inicio = this.selectionStart;

                                            const fin = this.selectionEnd;

                                            this.value =
                                                this.value.substring(0, inicio)
                                                + '    '
                                                + this.value.substring(fin);

                                            this.selectionStart =
                                                this.selectionEnd =
                                                inicio + 4;

                                            modificarEstado();

                                        }

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | CTRL + S
                                    |--------------------------------------------------------------------------
                                    */

                                    editor.addEventListener('keydown', function (event) {

                                        if (
                                            (event.ctrlKey || event.metaKey)
                                            &&
                                            event.key.toLowerCase() === 's'
                                        ) {

                                            event.preventDefault();

                                            btnGuardar.click();

                                        }

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | CTRL + K
                                    |--------------------------------------------------------------------------
                                    */

                                    editor.addEventListener('keydown', function (event) {

                                        if (
                                            (event.ctrlKey || event.metaKey)
                                            &&
                                            event.key.toLowerCase() === 'k'
                                        ) {

                                            event.preventDefault();

                                            if (
                                                confirm('¿Limpiar todo el código?')
                                            ) {

                                                editor.value = '';

                                                modificarEstado();

                                            }

                                        }

                                    });


                                    /*
                                    |--------------------------------------------------------------------------
                                    | PANTALLA COMPLETA
                                    |--------------------------------------------------------------------------
                                    */

                                    btnFullscreen.addEventListener(
                                        'click',
                                        function () {

                                            if (!document.fullscreenElement) {

                                                editorWrapper
                                                    .requestFullscreen();

                                            } else {

                                                document.exitFullscreen();

                                            }

                                        }
                                    );


                                    /*
                                    |--------------------------------------------------------------------------
                                    | INICIALIZAR
                                    |--------------------------------------------------------------------------
                                    */

                                    actualizarContadores();

                                });

                            </script>


                            {{-- IMAGEN --}}

                            <div class="col-md-12 mb-3">

                                <label>Imagen</label>

                                <input type="text" name="imagen" class="form-control"
                                    value="{{ old('imagen', $diseno->imagen) }}" placeholder="URL o nombre de imagen" />

                                @error('imagen')

                                    <small>
                                        <strong>
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        </strong>
                                    </small>

                                @enderror

                            </div>


                            {{-- BOTÓN --}}

                            <div class="col-md-12 mb-3">

                                <button type="submit" class="btn btn-primary float-end">
                                    Actualizar
                                </button>
                                {{-- VER --}}

                                <a href="{{ route('Diseno.show', $diseno) }}" class="px-3 py-2 bg-indigo-600
                                                                       hover:bg-indigo-700 text-white
                                                                       rounded-lg text-sm">
                                    Ver
                                </a>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
<!-- =========================================================
     PRETTIER
     ---------------------------------------------------------
     Librería utilizada para formatear código.
========================================================= -->

<script src="https://unpkg.com/prettier@3.5.3/standalone.js"></script>
<script src="https://unpkg.com/prettier@3.5.3/plugins/html.js"></script>
<script src="https://unpkg.com/prettier@3.5.3/plugins/babel.js"></script>
<script src="https://unpkg.com/prettier@3.5.3/plugins/postcss.js"></script>
@endsection