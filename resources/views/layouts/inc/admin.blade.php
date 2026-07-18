<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard || Mi blog</title>
    <!-- favicon
		============================================ -->
        <link href="{{ asset('img/icon/perfil_git.gif') }}" rel="icon">


    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<link rel="stylesheet"
href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    @vite(['resources/css/app.css','resources/js/app.js'])

    @vite(['resources/css/buscador.css','resources/js/busqueda.js'])

</head>

<body>

    @include('layouts.inc.nav')
    <div class="overlay"></div>

    <main class="main-wrapper" id="contenido-principal">
        @include('layouts.inc.sidebar')


    @yield('content')



    </main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: @json(session('success')),
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
@endif
</body>
<!--CDN bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{asset('admin/popper/popper.min.js')}}"></script>
<!-- datatables JS -->
<script type="module">
    // 1. Importamos Mermaid v10.9.5 como módulo
    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10.9.5/dist/mermaid.esm.min.mjs';
    mermaid.initialize({ 
        startOnLoad: false, 
        theme: 'default',
        securityLevel: 'loose' 
    });

    const editor = document.getElementById('markdownEditor');
    const preview = document.getElementById('realtimePreview');
    const wordCount = document.getElementById('wordCount');

    // --- NUEVO: OBJETO JSON DE SNIPPETS ---
    const snippets = {
        "h1": "# ",
        "h2": "## ",
        "h3": "### ",
        "h4": "#### ",
        "texto_negrita":"**Texto en negrita**",
        "texto_cursiva":"*Texto en cursiva*",
        "texto_tachado":"~~Texto tachado~~",
        "texto_cita":"> Esto es una cita",
        "lista_elemento":"- Lista\n- Elemento",
        "lista_enumerada":"1. Lista numerada\n2. Segundo elemento",
        "link": "[Google](https://google.com)",
        "image":"![Imagen](/storage/img/diagrama_flujo.svg)",
        "codigo_inline": "`Código inline`",
        "codigo_php":"```php\necho 'Hola';\n```",
        "estilo_tabla":"<style>\ntable,table th,table td{\ncolor:#ffffff;\n}\n</style>",
        "nota": "> **Nota:** ",
        "tabla":"| Acción | Atajo |\n |---|---|\n | Abrir archivo rápido | Ctrl + P |",
        "mermaid_clase": `<pre class="mermaid">\nclassDiagram\n    Animal <|-- Duck\n    Animal <|-- Fish\n    Animal <|-- Zebra\n    Animal : +int age\n    Animal : +String gender\n    Animal: +isMammal()\n    Animal: +mate()\n    class Duck{\n      +String beakColor\n      +swim()\n      +quack()\n    }\n    class Fish{\n      -int sizeInFeet\n      -canEat()\n    }\n    class Zebra{\n      +bool is_wild\n      +run()\n    }\n</pre>\n`,
        "mermaid_flujo": `<pre class="mermaid">\ngraph TD\n    A[Inicio] --> B{¿Existe?}\n    B -- Sí --> C[Procesar]\n    B -- No --> D[Error]\n    C --> E[Fin]\n</pre>\n`,
"mermaid_entidad_relacion": `<pre class="mermaid">\nerDiagram\n    OPPORTUNITY ||--o{ ORDER : generates\n    ORDER ||--|{ ORDER_ITEM : contains\n    PRODUCT ||--o{ ORDER_ITEM : includes\n    OPPORTUNITY {\n        string id\n        string name\n        string stage\n        string contact_email\n    }\n    ORDER {\n        string id\n        date orderDate\n        string status\n        float total_amount\n    }\n    PRODUCT {\n        string id\n        string name\n        float price\n        string sku\n    }\n    ORDER_ITEM {\n        int id\n        int quantity\n        float unit_price\n        float subtotal\n    }\n</pre>\n`,    };

    // 2. Configurar Marked
    const renderer = new marked.Renderer();
    renderer.code = function(code, language) {
        if (language === 'mermaid') {
            return `<pre class="mermaid">${code}</pre>`;
        }
        return `<pre><code>${code}</code></pre>`;
    };
    marked.setOptions({ renderer: renderer });

    // 3. Función de renderizado ASÍNCRONA
    async function renderMarkdown() {
        const text = editor.value;
        preview.innerHTML = marked.parse(text);
        
        const blocks = preview.querySelectorAll('.mermaid');
        if (blocks.length > 0) {
            try {
                await mermaid.run({ nodes: blocks });
            } catch (err) {
                console.error("Error en Mermaid:", err);
            }
        }
        
        const words = text.trim() ? text.trim().split(/\s+/).length : 0;
        wordCount.innerText = `${words} palabras`;
    }
  const headerSelector = document.getElementById('headerSelector');
    const imageSelector = document.getElementById('imageSelector');
    const insertBtn = document.getElementById('insertSnippet');

    if (insertBtn) {

        insertBtn.addEventListener('click', () => {

            const key = headerSelector.value;

            if (!key) return;

            let snippet = '';

            // SI ES IMAGEN
            if (key === 'image') {

                const imageUrl = imageSelector.value;

                if (!imageUrl) {
                    alert('Selecciona una imagen');
                    return;
                }

                snippet = `![Imagen](${imageUrl})`;

            } else if (snippets[key]) {

                snippet = snippets[key];

            }

            if (snippet) {

                const start = editor.selectionStart;
                const end = editor.selectionEnd;
                const text = editor.value;

                // INSERTAR EN EL CURSOR
                editor.value =
                    text.substring(0, start) +
                    snippet +
                    text.substring(end);

                // REPOSICIONAR CURSOR
                editor.focus();

                editor.selectionStart =
                    editor.selectionEnd =
                    start + snippet.length;

                // LIMPIAR SELECTS
                headerSelector.value = "";
                imageSelector.value = "";

                renderMarkdown();
            }

        });

    }

    // Eventos existentes
    editor.addEventListener('input', renderMarkdown);
    window.addEventListener('DOMContentLoaded', renderMarkdown);

    // Toggle y Tab...
    document.getElementById('togglePreview').addEventListener('change', function() {
        const editorCol = document.getElementById('editorCol');
        const previewCol = document.getElementById('previewCol');
        if(this.checked) {
            editorCol.classList.replace('col-md-12', 'col-md-6');
            previewCol.style.display = 'block';
        } else {
            editorCol.classList.replace('col-md-6', 'col-md-12');
            previewCol.style.display = 'none';
        }
    });

    editor.addEventListener('keydown', function(e) {
        if (e.key == 'Tab') {
            e.preventDefault();
            var start = this.selectionStart;
            var end = this.selectionEnd;
            this.value = this.value.substring(0, start) + "\t" + this.value.substring(end);
            this.selectionStart = this.selectionEnd = start + 1;
        }
    });
</script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<!-- para usar botones en datatables JS -->
<!-- <script src="{{asset('admin/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('admin/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/datatables/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script> -->

<script src="{{asset('admin/assets/js/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dynamic-pie-chart.js')}}"></script>
<script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/js/fullcalendar.js')}}"></script>
<script src="{{asset('admin/assets/js/jvectormap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/world-merc.js')}}"></script>
<script src="{{asset('admin/assets/js/polyfill.js')}}"></script>
<script src="{{asset('admin/assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</html>