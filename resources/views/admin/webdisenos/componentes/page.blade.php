<div id="contenidoDiseño" style="
        transform-origin: center center;
        transition: transform .12s ease;
    ">
    <!-- Tu diseño -->
    {!! $diseno->codigo !!}
</div>
<!-- =========================================================
     GRABADOR DE PANTALLA
     No modifica el contenido del diseño
========================================================= -->

<style>
    /* Contenedor completamente independiente */

    #grabadorFlotante {
        position: fixed;
        top: 20px;
        right: 20px;

        z-index: 999999;

        font-family: Arial, sans-serif;
    }


    /* Botón pequeño que siempre se ve */

    #grabadorBotonPrincipal {
        width: 42px;
        height: 42px;

        border-radius: 50%;

        border: none;

        background: #111827;
        color: white;

        cursor: pointer;

        font-size: 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        box-shadow:
            0 4px 15px rgba(0, 0, 0, 0.25);

        transition:
            transform 0.2s ease,
            background 0.2s ease;
    }


    #grabadorBotonPrincipal:hover {
        transform: scale(1.08);
        background: #1f2937;
    }


    /* Panel que aparece al pasar el mouse */

    #grabadorPanel {

        position: absolute;

        top: 50px;
        right: 0;

        width: 210px;

        padding: 12px;

        background: white;

        border-radius: 12px;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.20);

        border: 1px solid #e5e7eb;

        opacity: 0;

        visibility: hidden;

        transform: translateY(-8px);

        transition:
            opacity 0.2s ease,
            transform 0.2s ease,
            visibility 0.2s ease;
    }


    /* Mostrar panel al pasar el cursor */

    #grabadorFlotante:hover #grabadorPanel {

        opacity: 1;

        visibility: visible;

        transform: translateY(0);

    }


    /* Botones */

    #grabadorPanel button {

        width: 100%;

        border: none;

        border-radius: 8px;

        padding: 9px 12px;

        margin-bottom: 8px;

        cursor: pointer;

        font-size: 14px;

        font-weight: 600;

        transition:
            background 0.2s ease,
            opacity 0.2s ease;
    }


    /* Iniciar */

    #grabadorBtnIniciar {

        background: #16a34a;

        color: white;
    }


    #grabadorBtnIniciar:hover {

        background: #15803d;
    }


    /* Detener */

    #grabadorBtnDetener {

        background: #dc2626;

        color: white;
    }


    #grabadorBtnDetener:hover {

        background: #b91c1c;
    }


    /* Botón deshabilitado */

    #grabadorPanel button:disabled {

        opacity: 0.45;

        cursor: not-allowed;
    }


    /* Estado */

    #grabadorEstado {

        font-size: 12px;

        color: #6b7280;

        text-align: center;

        margin-top: 5px;

        margin-bottom: 0;
    }


    /* Ocultar estado */

    #grabadorEstado.grabadorOculto {

        display: none;
    }


    /* Durante grabación */

    #grabadorBotonPrincipal.grabando {

        background: #dc2626;

        animation: grabadorPulso 1.2s infinite;
    }


    @keyframes grabadorPulso {

        0% {
            box-shadow:
                0 0 0 0 rgba(220, 38, 38, 0.5);
        }

        70% {
            box-shadow:
                0 0 0 10px rgba(220, 38, 38, 0);
        }

        100% {
            box-shadow:
                0 0 0 0 rgba(220, 38, 38, 0);
        }

    }
</style>


<!-- =========================================================
     CONTROLES DEL GRABADOR
========================================================= -->

<div id="grabadorFlotante">

    <!-- Botón pequeño -->

    <button type="button" id="grabadorBotonPrincipal" title="Grabador de pantalla">
        🎥
    </button>


    <!-- Panel -->

    <div id="grabadorPanel">


        <!-- Seleccionar carpeta -->

        <button type="button" id="grabadorBtnCarpeta">

            📁 Elegir carpeta

        </button>


        <!-- Cambiar carpeta -->

        <button type="button" id="grabadorBtnCambiarCarpeta">

            🔄 Cambiar carpeta

        </button>


        <!-- Información de carpeta -->

        <p id="grabadorCarpeta" class="grabadorOculto">

            📂 Carpeta: no seleccionada

        </p>


        <!-- Iniciar -->

        <button type="button" id="grabadorBtnIniciar">

            ▶ Iniciar Grabación

        </button>


        <!-- Detener -->

        <button type="button" id="grabadorBtnDetener" disabled>

            ■ Detener Grabación

        </button>


        <!-- Estado -->

        <p id="grabadorEstado" class="grabadorOculto">

            Estado: Listo

        </p>

    </div>

</div>


<script>

(function () {

    /* =========================================================
       VARIABLES
    ========================================================= */

    let grabadorMediaRecorder = null;

    let grabadorChunks = [];

    let grabadorStream = null;

    /*
     * Referencia a la carpeta seleccionada
     *
     * FileSystemDirectoryHandle
     */

    let grabadorDirectorio = null;
/*
 * Nombre del diseño (viene del controlador)
 */
const grabadorNombreDiseno = @json($diseno->nombre);

    /* =========================================================
       ELEMENTOS
    ========================================================= */

    const botonPrincipal =
        document.getElementById(
            'grabadorBotonPrincipal'
        );


    const botonCarpeta =
        document.getElementById(
            'grabadorBtnCarpeta'
        );


    const botonCambiarCarpeta =
        document.getElementById(
            'grabadorBtnCambiarCarpeta'
        );


    const botonIniciar =
        document.getElementById(
            'grabadorBtnIniciar'
        );


    const botonDetener =
        document.getElementById(
            'grabadorBtnDetener'
        );


    const carpetaTexto =
        document.getElementById(
            'grabadorCarpeta'
        );


    const estado =
        document.getElementById(
            'grabadorEstado'
        );

        /* =========================================================
   LIMPIAR TEXTO PARA NOMBRE DE ARCHIVO
========================================================= */

function limpiarNombre(texto) {

    return String(texto || '')
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')   // quita tildes
        .replace(/[^a-zA-Z0-9]+/g, '-')    // símbolos y espacios a guiones
        .replace(/^-+|-+$/g, '')           // quita guiones en los extremos
        .toLowerCase()
        .substring(0, 60)                  // limita el largo
        || 'diseno';

}


/* =========================================================
   NOMBRE FINAL DEL ARCHIVO
========================================================= */

function obtenerNombreArchivo() {

    return (
        limpiarNombre(grabadorNombreDiseno) +
        '-' +
        obtenerFecha() +
        '.webm'
    );

}


    /* =========================================================
       MOSTRAR ESTADO
    ========================================================= */

    function mostrarEstado(texto) {

        estado.textContent = texto;

        estado.classList.remove(
            'grabadorOculto'
        );

    }


    /* =========================================================
       OCULTAR ESTADO
    ========================================================= */

    function ocultarEstado() {

        estado.classList.add(
            'grabadorOculto'
        );

    }


    /* =========================================================
       ELEGIR CARPETA
    ========================================================= */

    async function elegirCarpeta() {

        /*
         * Comprobar soporte del navegador
         */

        if (
            !('showDirectoryPicker' in window)
        ) {

            mostrarEstado(
                '⚠ Tu navegador no permite elegir carpetas directamente'
            );

            return;

        }


        try {

            /*
             * Abrir selector de carpetas
             */

            grabadorDirectorio =
                await window.showDirectoryPicker({
                    mode: 'readwrite'
                });


            /*
             * Mostrar nombre
             */

            carpetaTexto.textContent =
                '📂 Carpeta: ' +
                grabadorDirectorio.name;


            carpetaTexto.classList.remove(
                'grabadorOculto'
            );


            mostrarEstado(
                '✓ Carpeta seleccionada'
            );


            /*
             * Ocultar mensaje después
             */

            setTimeout(
                ocultarEstado,
                2500
            );

        }
        catch (error) {

            /*
             * El usuario canceló
             */

            console.log(
                'Selección de carpeta cancelada',
                error
            );

        }

    }


    /* =========================================================
       BOTÓN CARPETA
    ========================================================= */

    botonCarpeta.addEventListener(
        'click',
        elegirCarpeta
    );


    botonCambiarCarpeta.addEventListener(
        'click',
        elegirCarpeta
    );


    /* =========================================================
       INICIAR GRABACIÓN
    ========================================================= */

    botonIniciar.addEventListener(
        'click',
        async function () {

            try {

                /*
                 * Solicitar captura de pantalla
                 */

                grabadorStream =
                    await navigator
                        .mediaDevices
                        .getDisplayMedia({

                            video: {
                                frameRate: 30
                            },

                            audio: true

                        });


                /*
                 * Limpiar fragmentos anteriores
                 */

                grabadorChunks = [];


                /*
                 * Seleccionar formato compatible
                 */

                let opciones = {};


                if (
                    MediaRecorder.isTypeSupported(
                        'video/webm;codecs=vp9'
                    )
                ) {

                    opciones = {

                        mimeType:
                            'video/webm;codecs=vp9'

                    };

                }

                else if (
                    MediaRecorder.isTypeSupported(
                        'video/webm;codecs=vp8'
                    )
                ) {

                    opciones = {

                        mimeType:
                            'video/webm;codecs=vp8'

                    };

                }

                else {

                    opciones = {

                        mimeType:
                            'video/webm'

                    };

                }


                /*
                 * Crear MediaRecorder
                 */

                grabadorMediaRecorder =
                    new MediaRecorder(
                        grabadorStream,
                        opciones
                    );


                /*
                 * Recibir fragmentos
                 */

                grabadorMediaRecorder
                    .ondataavailable =
                    function (event) {

                        if (
                            event.data &&
                            event.data.size > 0
                        ) {

                            grabadorChunks.push(
                                event.data
                            );

                        }

                    };


                /*
                 * Cuando termina
                 */

                grabadorMediaRecorder.onstop =
                    function () {

                        finalizarGrabacion();

                    };


                /*
                 * Detectar botón "dejar de compartir"
                 */

                const videoTrack =
                    grabadorStream
                        .getVideoTracks()[0];


                if (videoTrack) {

                    videoTrack.onended =
                        function () {

                            detenerGrabacion();

                        };

                }


                /*
                 * Iniciar
                 */

                grabadorMediaRecorder.start(
                    1000
                );


                /*
                 * Cambiar interfaz
                 */

                botonIniciar.disabled =
                    true;


                botonDetener.disabled =
                    false;


                if (botonPrincipal) {

                    botonPrincipal.classList.add(
                        'grabando'
                    );

                }


                mostrarEstado(
                    '🔴 Grabando...'
                );

            }
            catch (error) {

                console.error(
                    'Error al iniciar grabación:',
                    error
                );


                mostrarEstado(
                    '❌ Error o permiso cancelado'
                );


                botonIniciar.disabled =
                    false;


                botonDetener.disabled =
                    true;

            }

        }
    );


    /* =========================================================
       DETENER
    ========================================================= */

    botonDetener.addEventListener(
        'click',
        function () {

            detenerGrabacion();

        }
    );


    /* =========================================================
       DETENER GRABACIÓN
    ========================================================= */

    function detenerGrabacion() {

        if (
            grabadorMediaRecorder &&
            grabadorMediaRecorder.state !==
            'inactive'
        ) {

            grabadorMediaRecorder.stop();

        }

    }


    /* =========================================================
       GUARDAR DIRECTAMENTE EN CARPETA
    ========================================================= */

    async function guardarEnCarpeta(blob) {

        /*
         * Comprobar que existe una carpeta
         */

        if (!grabadorDirectorio) {

            return false;

        }


        try {

            /*
             * Crear nombre del archivo
             */

           const nombreArchivo = obtenerNombreArchivo();


            /*
             * Crear archivo dentro
             * de la carpeta seleccionada
             */

            const archivo =
                await grabadorDirectorio
                    .getFileHandle(
                        nombreArchivo,
                        {
                            create: true
                        }
                    );


            /*
             * Crear escritor
             */

            const escritor =
                await archivo.createWritable();


            /*
             * Escribir video

             */

            await escritor.write(
                blob
            );


            /*
             * Cerrar archivo
             */

            await escritor.close();


            console.log(
                'Video guardado en:',
                nombreArchivo
            );


            return true;

        }
        catch (error) {

            console.error(
                'Error guardando archivo:',
                error
            );


            return false;

        }

    }


    /* =========================================================
       GENERAR FECHA PARA NOMBRE
    ========================================================= */

    function obtenerFecha() {

        const ahora =
            new Date();


        const año =
            ahora.getFullYear();


        const mes =
            String(
                ahora.getMonth() + 1
            ).padStart(
                2,
                '0'
            );


        const dia =
            String(
                ahora.getDate()
            ).padStart(
                2,
                '0'
            );


        const hora =
            String(
                ahora.getHours()
            ).padStart(
                2,
                '0'
            );


        const minutos =
            String(
                ahora.getMinutes()
            ).padStart(
                2,
                '0'
            );


        const segundos =
            String(
                ahora.getSeconds()
            ).padStart(
                2,
                '0'
            );


        return (
            año +
            mes +
            dia +
            '-' +
            hora +
            minutos +
            segundos
        );

    }


    /* =========================================================
       DESCARGA FALLBACK
    ========================================================= */

    function descargarVideo(blob) {

        /*
         * Crear URL temporal
         */

        const url =
            URL.createObjectURL(
                blob
            );


        /*
         * Crear enlace

         */

        enlace.download = obtenerNombreArchivo();


        enlace.href =
            url;


        enlace.download =
            'grabacion-' +
            obtenerFecha() +
            '.webm';


        document.body.appendChild(
            enlace
        );


        enlace.click();


        document.body.removeChild(
            enlace
        );


        /*
         * Liberar memoria
         */

        setTimeout(
            function () {

                URL.revokeObjectURL(
                    url
                );

            },
            1000
        );

    }


    /* =========================================================
       FINALIZAR GRABACIÓN
    ========================================================= */

    async function finalizarGrabacion() {

        /*
         * Crear Blob

         */

        const blob =
            new Blob(
                grabadorChunks,
                {
                    type: 'video/webm'
                }
            );


        /*
         * Intentar guardar directamente
         * en la carpeta seleccionada
         */

        let guardado =
            false;


        if (grabadorDirectorio) {

            guardado =
                await guardarEnCarpeta(
                    blob
                );

        }


        /*
         * Si se pudo guardar
         */

        if (guardado) {

            mostrarEstado(
                '✓ Video guardado en la carpeta seleccionada'
            );

        }

        /*
         * Si no hay carpeta,
         * utilizar descarga tradicional
         */

        else {

            descargarVideo(
                blob
            );


            mostrarEstado(
                '✓ Video descargado'
            );

        }


        /*
         * Detener pistas

         */

        if (grabadorStream) {

            grabadorStream
                .getTracks()
                .forEach(
                    function (track) {

                        track.stop();

                    }
                );

        }


        /*
         * Restaurar botones
         */

        botonIniciar.disabled =
            false;


        botonDetener.disabled =
            true;


        if (botonPrincipal) {

            botonPrincipal.classList.remove(
                'grabando'
            );

        }


        /*
         * Limpiar referencias

         */

        grabadorStream =
            null;

        grabadorMediaRecorder =
            null;

        grabadorChunks =
            [];


        /*
         * Ocultar estado

         */

        setTimeout(
            function () {

                ocultarEstado();

            },
            4000
        );

    }

})();

</script>


<script>
(function () {

    /*
    =========================================================
    CONFIGURACIÓN
    =========================================================
    */

    let zoomActual = 1;

    const ZOOM_MIN = 0.5;
    const ZOOM_MAX = 2.5;

    // Zoom con teclado: 50%
    const ZOOM_TECLADO = 0.5;

    // Zoom con rueda: 10%
    const ZOOM_SCROLL = 0.1;

    const elementoZoom =
        document.getElementById('contenidoDiseño');


    /*
    =========================================================
    POSICIÓN DEL CURSOR
    =========================================================
    */

    let cursorX = 0;
    let cursorY = 0;

    document.addEventListener('mousemove', function (event) {

        cursorX = event.clientX;
        cursorY = event.clientY;

    });


    /*
    =========================================================
    CALCULAR ORIGEN DEL ZOOM
    =========================================================
    */

    function actualizarOrigenCursor() {

        if (!elementoZoom) return;

        const rect =
            elementoZoom.getBoundingClientRect();

        const x =
            cursorX - rect.left;

        const y =
            cursorY - rect.top;

        const porcentajeX =
            (x / rect.width) * 100;

        const porcentajeY =
            (y / rect.height) * 100;

        elementoZoom.style.transformOrigin =
            porcentajeX + '% ' +
            porcentajeY + '%';
    }


    /*
    =========================================================
    APLICAR ZOOM
    =========================================================
    */

    function aplicarZoom(nuevoZoom) {

        if (!elementoZoom) return;

        zoomActual = Math.max(
            ZOOM_MIN,
            Math.min(
                ZOOM_MAX,
                nuevoZoom
            )
        );

        actualizarOrigenCursor();

        elementoZoom.style.transform =
            'scale(' + zoomActual + ')';
    }


    /*
    =========================================================
    CTRL + SCROLL
    =========================================================
    */

    document.addEventListener(
        'wheel',
        function (event) {

            if (!event.ctrlKey) {
                return;
            }

            event.preventDefault();

            if (!elementoZoom) {
                return;
            }

            if (event.deltaY < 0) {

                aplicarZoom(
                    zoomActual + ZOOM_SCROLL
                );

            } else {

                aplicarZoom(
                    zoomActual - ZOOM_SCROLL
                );
            }

        },
        {
            passive: false
        }
    );


/*
=========================================================
ATAJOS DE TECLADO
=========================================================

Ctrl + Z  → aumentar 50%
Ctrl + X  → disminuir 50%
Ctrl + 0  → volver a 100%

=========================================================
*/

document.addEventListener(
    'keydown',
    function (event) {

        /*
        -------------------------------------------------
        CTRL + Z → AUMENTAR
        -------------------------------------------------
        */

        if (
            event.ctrlKey &&
            event.key.toLowerCase() === 'z'
        ) {

            event.preventDefault();

            aplicarZoom(
                zoomActual + ZOOM_TECLADO
            );

            return;
        }


        /*
        -------------------------------------------------
        CTRL + X → DISMINUIR
        -------------------------------------------------
        */

        if (
            event.ctrlKey &&
            event.key.toLowerCase() === 'x'
        ) {

            event.preventDefault();

            aplicarZoom(
                zoomActual - ZOOM_TECLADO
            );

            return;
        }


        /*
        -------------------------------------------------
        CTRL + 0 → RESTABLECER
        -------------------------------------------------
        */

        if (
            event.ctrlKey &&
            event.key === 'c'
        ) {

            event.preventDefault();

            zoomActual = 1;

            if (elementoZoom) {

                elementoZoom.style.transform =
                    'scale(1)';

                elementoZoom.style.transformOrigin =
                    'center center';
            }

            return;
        }

    }
);
})();
</script>
