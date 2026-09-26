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

            const nombreArchivo =
                'grabacion-' +
                obtenerFecha() +
                '.webm';


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

        const enlace =
            document.createElement(
                'a'
            );


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
        ZOOM SIGUIENDO EL CURSOR
        =========================================================
        */

        let zoomActual = 1;

        const ZOOM_MIN = 0.5;
        const ZOOM_MAX = 2.5;
        const ZOOM_PASO = 0.1;

        /*
        Elemento que quieres ampliar.
    
        Cambia #contenidoDiseño por el ID
        de tu preview.
        */

        const elementoZoom =
            document.getElementById('contenidoDiseño');

        /*
        Posición actual del cursor
        */

        let cursorX = 0;
        let cursorY = 0;


        /*
        =========================================================
        SEGUIR CURSOR
        =========================================================
        */

        document.addEventListener(
            'mousemove',
            function (event) {

                cursorX = event.clientX;
                cursorY = event.clientY;

            }
        );


        /*
        =========================================================
        CTRL + SCROLL
        =========================================================
        */

        document.addEventListener(
            'wheel',
            function (event) {

                /*
                Solo activar con CTRL
                */

                if (!event.ctrlKey) {
                    return;
                }

                /*
                Evitar zoom del navegador
                */

                event.preventDefault();


                if (!elementoZoom) {
                    return;
                }


                /*
                =================================================
                POSICIÓN DEL ELEMENTO
                =================================================
                */

                const rect =
                    elementoZoom.getBoundingClientRect();


                /*
                =================================================
                POSICIÓN DEL CURSOR DENTRO DEL ELEMENTO
                =================================================
                */

                const x =
                    event.clientX - rect.left;

                const y =
                    event.clientY - rect.top;


                /*
                =================================================
                CONVERTIR A PORCENTAJE
                =================================================
                */

                const porcentajeX =
                    (x / rect.width) * 100;

                const porcentajeY =
                    (y / rect.height) * 100;


                /*
                =================================================
                CAMBIAR ZOOM
                =================================================
                */

                if (event.deltaY < 0) {

                    zoomActual += ZOOM_PASO;

                } else {

                    zoomActual -= ZOOM_PASO;

                }


                /*
                Limitar zoom
                */

                zoomActual = Math.max(
                    ZOOM_MIN,
                    Math.min(
                        ZOOM_MAX,
                        zoomActual
                    )
                );


                /*
                =================================================
                HACER QUE EL CURSOR SEA EL CENTRO
                =================================================
                */

                elementoZoom.style.transformOrigin =
                    porcentajeX + '% ' +
                    porcentajeY + '%';


                /*
                Aplicar zoom
                */

                elementoZoom.style.transform =
                    'scale(' + zoomActual + ')';


                /*
                Mostrar porcentaje
                */

                mostrarZoom(
                    Math.round(
                        zoomActual * 100
                    ) + '%'
                );

            },
            {
                passive: false
            }
        );


        /*
        =========================================================
        CTRL + 0
        =========================================================
        */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.ctrlKey &&
                    event.key === '0'
                ) {

                    event.preventDefault();

                    zoomActual = 1;

                    elementoZoom.style.transform =
                        'scale(1)';

                    elementoZoom.style.transformOrigin =
                        'center center';

                    mostrarZoom('100%');

                }

            }
        );


        /*
        =========================================================
        INDICADOR DE ZOOM
        =========================================================
        */

        function mostrarZoom(valor) {

            let indicador =
                document.getElementById(
                    'indicadorZoom'
                );


            if (!indicador) {

                indicador =
                    document.createElement(
                        'div'
                    );

                indicador.id =
                    'indicadorZoom';


                indicador.style.position =
                    'fixed';

                indicador.style.zIndex =
                    '999999';

                indicador.style.pointerEvents =
                    'none';

                indicador.style.background =
                    'rgba(15, 23, 42, .95)';

                indicador.style.color =
                    '#fff';

                indicador.style.padding =
                    '8px 12px';

                indicador.style.borderRadius =
                    '8px';

                indicador.style.fontFamily =
                    'monospace';

                indicador.style.fontSize =
                    '13px';

                indicador.style.boxShadow =
                    '0 8px 25px rgba(0,0,0,.25)';

                document.body.appendChild(
                    indicador
                );

            }


            indicador.textContent =
                '🔍 ' + valor;


            /*
            Poner indicador cerca
            del cursor
            */

            indicador.style.left =
                (cursorX + 15) + 'px';

            indicador.style.top =
                (cursorY + 15) + 'px';


            indicador.style.display =
                'block';


            clearTimeout(
                indicador._timeout
            );


            indicador._timeout =
                setTimeout(
                    function () {

                        indicador.style.display =
                            'none';

                    },
                    800
                );

        }

    })();

</script>