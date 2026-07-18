@extends('layouts.inc.admin')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/github-markdown-css/github-markdown.min.css">
    <div class="container-fluid mt-4">
        <a href="{{ route('Markdown.show') }}" class="btn btn-sm btn-info border-0 me-2 text-light">
            <img src="{{ asset('img/icon/volver.svg') }}" width="20" height="20">

            Volver a documentos
        </a>
        <br>
        <br>
        <form action="{{ route('admin.markdown.update', $filename) }}" method="POST" id="markdownForm">
            @csrf
            <div class="card shadow-sm border-0">

                @include('admin.markdown.configuration-general')


                <div class="card-body p-0">
                    <div class="row g-0">
                        {{-- Lado Izquierdo: Editor --}}
                        <div class="col-md-6 border-end" id="editorCol">

                            <div id="realtimePreview" class="p-4 markdown-body overflow-auto">

                               

                            </div>
                        </div>

                        {{-- Lado Derecho: Previsualización Realtime --}}
                        <div class="col-md-6 bg-white" id="previewCol">
                            <textarea name="code" id="markdownEditor" class="form-control editor-textarea"
                                placeholder="Escribe aquí...">{{ $contenidoRaw }}</textarea>
                        </div>
                    </div>
                </div>

                @include('admin.markdown.configuration-code-md')
            </div>
        </form>
    </div>
    {{-- MODAL PARA CAMBIAR NOMBRE --}}
    <div class="modal fade" id="renameModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.markdown.rename', $filename) }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Cambiar nombre del archivo</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-modal="hide"
                            data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nuevo nombre</label>
                            <div class="input-group">
                                <input type="text" name="new_filename" class="form-control"
                                    value="{{ pathinfo($filename, PATHINFO_FILENAME) }}" required>
                                <span class="input-group-text">.md</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info text-white">Actualizar Nombre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">

<script src="https://cdn.jsdelivr.net/npm/marked@4.3.0/marked.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  <script>

const editor = document.getElementById('markdownEditor');
const preview = document.getElementById('realtimePreview');

function renderMarkdown() {

    const text = editor.value;

    preview.innerHTML = marked.parse(text);

    preview.querySelectorAll('pre code').forEach((block) => {

        hljs.highlightElement(block);

    });

}

editor.addEventListener('input', renderMarkdown);

renderMarkdown();

</script>
    <style>
        .editor-textarea {
            height: 65vh;
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            border: none;
            resize: none;
            background: #282c34;
            color: #abb2bf;
            padding: 20px;
            outline: none;
        }

        .editor-textarea:focus {
            background: #2b303b;
            color: #fff;
            box-shadow: none;
        }

        #realtimePreview {
            background-color: #ffffff;
            color: #24292e;
        }

        /* Estilo para que el scroll sea independiente en cada lado */
        .editor-textarea,
        #realtimePreview {
            max-height: 65vh;
        }
    </style>
@endsection