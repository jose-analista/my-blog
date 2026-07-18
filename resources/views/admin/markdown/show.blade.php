@extends('layouts.inc.admin')

@section('content')
    <div class="container-fluid mt-4">
        {{-- Mensajes de feedback --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

                        {{-- IZQUIERDA --}}
                        <div class="d-flex align-items-center gap-2">

                            <h5 class="mb-0 text-primary">

                                <i class="fas fa-file-alt me-2"></i>
                                Documentación Markdown

                            </h5>

                            <span class="badge bg-info text-light">

                                {{ count($archivos) }} Archivos

                            </span>

                        </div>


                        {{-- DERECHA --}}
                        <div class="d-flex flex-wrap align-items-center gap-2">

                            {{-- NUEVO DOCUMENTO --}}
                            <button class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal"
                                data-bs-target="#newDocModal">

                                <img src="{{ asset('img/icon/document.svg') }}" width="20" height="20">

                                Nuevo Documento

                            </button>


                            {{-- AGREGAR SVG --}}
                            <button type="button" class="btn btn-success btn-sm d-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#modalSvg">

                                <img src="{{ asset('img/icon/add.svg') }}" width="20" height="20">

                                Agregar SVG

                            </button>


                            {{-- IMÁGENES --}}
                            <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#modalimagen">

                                <img src="{{ asset('img/icon/image.svg') }}" width="20" height="20">

                                Imágenes

                            </button>

                        </div>

                    </div>


                    @include('admin.markdown.modal-add-svg')

                    @include('admin.markdown.modal-image')

                    @include('admin.markdown.modal-form-add-documento')

                    <a href="{{ route('admin.markdown.exportAll') }}"
   class="btn btn-primary">

    <i class="fas fa-file-archive"></i>

    Exportar Todo ZIP
</a>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row mb-3">

                                <!-- <div class="col-md-4 ms-auto">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-white"><i
                                                                class="fas fa-search text-muted"></i></span>
                                                        <input type="text" id="fileSearch" class="form-control"
                                                            placeholder="Buscar documento por nombre...">
                                                    </div>
                                                </div> -->
                            </div>

                            <table class="table table-hover align-middle" id="myTable">

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-white">Nombre del Archivo</th>
                                        <th class="text-white">Tamaño</th>
                                        <th class="text-white">Última Modificación</th>
                                   
                                        <th class="text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($archivos as $archivo)
                                        <tr>
                                            <td>
                                                <i class="text-warning fas fa-file-code me-2"></i>
                                                <a href="{{ route('admin.markdown.view', $archivo->getFilename()) }}"
   class="text-decoration-none text-primary fw-bold">

    {{ $archivo->getFilename() }}

</a>
                                               
                                            </td>
                                            <td>
                                                {{ number_format($archivo->getSize() / 1024, 2) }} KB
                                            </td>
                                            <td class="text-muted">
                                                {{ date('d/m/Y H:i', $archivo->getMTime()) }}
                                            </td>
                                      
                                            <td>
                                                {{-- Formulario para Eliminar --}}
                                                <form action="{{ route('admin.markdown.destroy', $archivo->getFilename()) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar este documento? Esta acción no se puede deshacer.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm rounded-pill px-3">
                                                        <img src="{{ asset('img/icon/delete.svg') }}" alt="" width="20px" height="20px"> Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                                No se encontraron archivos Markdown en el servidor.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            transition: 0.3s;
        }

        .card {
            border-radius: 12px;
            border: none;
        }
    </style>
    <script>
        document.getElementById('fileSearch').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('table tbody tr');

            rows.forEach(row => {
                // Buscamos el texto dentro de la primera celda (donde está el nombre)
                let fileName = row.querySelector('td:first-child').textContent.toLowerCase();

                if (fileName.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection