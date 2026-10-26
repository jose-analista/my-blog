@extends('layouts.inc.admin')

@section('content')

@include('admin.empresa.create-modal')
@include('admin.empresa.modal.buscarespecifico')
@include('admin.empresa.modal.buscarsector')

<style>
    /* ===== EMPRESAS CAYTECH ===== */
    .empresas-page {
        --emp-primary: #4f46e5;
        --emp-primary-soft: #eef2ff;
        --emp-border: #e5e7eb;
        --emp-muted: #64748b;
        --emp-text: #0f172a;
        color: var(--emp-text);
        padding-bottom: 28px;
    }

    .empresas-page .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 24px;
    }

    .empresas-page .page-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin: 0;
        font-size: 25px;
        font-weight: 800;
        letter-spacing: -.7px;
        color: var(--emp-text);
    }

    .empresas-page .title-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        border-radius: 15px;
        background: var(--emp-primary-soft);
        color: var(--emp-primary);
        flex-shrink: 0;
    }

    .empresas-page .page-subtitle {
        margin: 5px 0 0;
        color: var(--emp-muted);
        font-size: 13px;
    }

    .empresas-page .section-card {
        background: #fff;
        border: 1px solid var(--emp-border);
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
        margin-bottom: 22px;
        overflow: hidden;
    }

    .empresas-page .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
        padding: 19px 22px;
        border-bottom: 1px solid #edf0f4;
    }

    .empresas-page .section-title {
        font-size: 15px;
        font-weight: 750;
        margin: 0;
        color: var(--emp-text);
    }

    .empresas-page .section-description {
        color: var(--emp-muted);
        font-size: 12px;
        margin: 5px 0 0;
    }

    .empresas-page .toolbar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 9px;
    }

    .empresas-page .btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 650;
        padding: 9px 13px;
        transition: .2s ease;
    }

    .empresas-page .btn:hover {
        transform: translateY(-1px);
    }

    .empresas-page .btn-primary {
        background: var(--emp-primary);
        border-color: var(--emp-primary);
    }

    .empresas-page .btn-primary:hover {
        background: #4338ca;
        border-color: #4338ca;
    }

    .empresas-page .btn-search {
        background: #fff;
        border: 1px solid var(--emp-border);
        color: #334155;
    }

    .empresas-page .btn-search:hover {
        color: var(--emp-primary);
        border-color: #c7d2fe;
        background: #f8faff;
    }

    .empresas-page .btn img {
        width: 17px;
        height: 17px;
        object-fit: contain;
    }

    /* ===== MAPA ===== */
    .empresas-page .map-wrapper {
        position: relative;
        padding: 18px;
    }

    .empresas-page .map-container {
        position: relative;
        overflow: hidden;
        border-radius: 13px;
        border: 1px solid var(--emp-border);
        background: #f1f5f9;
    }

    .empresas-page #mapa {
        display: block;
        width: 100%;
        height: clamp(300px, 45vw, 440px);
        border: 0;
    }

    .empresas-page .map-caption {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--emp-muted);
        font-size: 12px;
        margin-top: 12px;
    }

    .empresas-page .map-caption .map-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        flex-shrink: 0;
    }

    /* ===== RESULTADO DE BÚSQUEDA ===== */
    .empresas-page #infoEmpresa {
        padding: 0 18px 18px;
    }

    .empresas-page #infoEmpresa .card {
        border: 1px solid #e0e7ff;
        border-radius: 12px;
        background: #f8faff;
        padding: 16px !important;
        color: var(--emp-text);
        box-shadow: none;
    }

    .empresas-page #infoEmpresa a {
        overflow-wrap: anywhere;
    }

    /* ===== TABLA ===== */
    .empresas-page .table-section-body {
        padding: 20px;
    }

    .empresas-page .table-responsive {
        border: 1px solid var(--emp-border);
        border-radius: 12px;
        overflow-x: auto;
    }

    .empresas-page #myTable {
        width: 100% !important;
        margin: 0 !important;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 12px;
        vertical-align: middle;
    }

    .empresas-page #myTable thead th {
        padding: 15px 13px;
        background: #f8fafc;
        color: #475569 !important;
        border-bottom: 1px solid var(--emp-border);
        border-top: 0;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .045em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .empresas-page #myTable tbody td {
        padding: 13px;
        border-color: #edf0f4;
        color: #475569;
        background: #fff;
    }

    .empresas-page #myTable tbody tr {
        transition: background .15s ease;
    }

    .empresas-page #myTable tbody tr:hover td {
        background: #f8faff;
    }

    .empresas-page #myTable tbody tr:last-child td {
        border-bottom: 0;
    }

    .empresas-page .company-name {
        color: #0f172a;
        font-weight: 700;
        min-width: 130px;
    }

    .empresas-page .company-rut {
        color: #64748b;
        font-family: monospace;
        white-space: nowrap;
    }

    .empresas-page .contact-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        max-width: 230px;
        color: #4f46e5;
        text-decoration: none;
        overflow-wrap: anywhere;
    }

    .empresas-page .contact-link:hover {
        color: #3730a3;
        text-decoration: underline;
    }

    .empresas-page .empty-value {
        color: #94a3b8;
        font-size: 11px;
    }

    .empresas-page .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
        min-width: 125px;
    }

    .empresas-page .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 9px;
        border: 1px solid var(--emp-border);
        background: #fff;
        color: #475569;
        text-decoration: none;
        transition: .2s;
    }

    .empresas-page .action-btn:hover {
        background: var(--emp-primary-soft);
        border-color: #c7d2fe;
        color: var(--emp-primary);
    }

    .empresas-page .action-btn.delete:hover {
        color: #dc2626;
        border-color: #fecaca;
        background: #fef2f2;
    }

    .empresas-page .action-btn img {
        width: 16px;
        height: 16px;
    }

    /* ===== DATA TABLES ===== */
    .empresas-page .dataTables_wrapper {
        width: 100%;
    }

    .empresas-page .dataTables_wrapper .dataTables_length,
    .empresas-page .dataTables_wrapper .dataTables_filter,
    .empresas-page .dataTables_wrapper .dataTables_info,
    .empresas-page .dataTables_wrapper .dataTables_paginate {
        font-size: 12px;
        color: var(--emp-muted);
        margin-bottom: 12px;
        margin-top: 12px;
    }

    .empresas-page .dataTables_wrapper .dataTables_filter input,
    .empresas-page .dataTables_wrapper .dataTables_length select {
        border: 1px solid var(--emp-border);
        border-radius: 8px;
        padding: 6px 9px;
        background: #fff;
        color: #334155;
        outline: none;
    }

    .empresas-page .dataTables_wrapper .dataTables_filter input:focus,
    .empresas-page .dataTables_wrapper .dataTables_length select:focus {
        border-color: #a5b4fc;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .1);
    }

    .empresas-page .dataTables_wrapper .paginate_button {
        border-radius: 7px !important;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .empresas-page .page-heading {
            align-items: flex-start;
        }

        .empresas-page .page-title {
            font-size: 21px;
        }

        .empresas-page .toolbar {
            width: 100%;
        }

        .empresas-page .toolbar .btn {
            flex: 1 1 auto;
        }

        .empresas-page .section-header {
            padding: 16px;
        }

        .empresas-page .map-wrapper {
            padding: 12px;
        }

        .empresas-page #mapa {
            height: 330px;
        }

        .empresas-page .table-section-body {
            padding: 12px;
        }

        .empresas-page .dataTables_wrapper .dataTables_filter,
        .empresas-page .dataTables_wrapper .dataTables_length {
            float: none;
            text-align: left;
        }

        .empresas-page .dataTables_wrapper .dataTables_filter input {
            max-width: 100%;
            margin-left: 0;
        }
    }

    @media (max-width: 480px) {
        .empresas-page .title-icon {
            width: 42px;
            height: 42px;
        }

        .empresas-page .toolbar .btn {
            width: 100%;
            flex: 1 1 100%;
        }

        .empresas-page .section-header {
            align-items: flex-start;
        }
    }
</style>

<div class="container-fluid empresas-page">

    {{-- CABECERA --}}
    <div class="page-heading">
        <div>
            <h1 class="page-title">
                <span class="title-icon">
                    <svg width="25" height="25" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <rect x="3" y="7" width="18" height="14" rx="2"/>
                        <path d="M8 7V4h8v3M3 12h18M10 12v2h4v-2"/>
                    </svg>
                </span>
                <span>Empresas</span>
            </h1>
            <p class="page-subtitle">
                Administra empresas, contactos y oportunidades comerciales.
            </p>
        </div>

        <button type="button"
                class="btn btn-primary shadow-sm"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
            <img src="{{ asset('img/icon/add.svg') }}" alt="" width="18" height="18">
            Agregar empresa
        </button>
    </div>

    {{-- MAPA Y BÚSQUEDAS --}}
    <section class="section-card">
        <div class="section-header">
            <div>
                <h2 class="section-title">Explorador de empresas</h2>
                <p class="section-description">
                    Localiza empresas y consulta oportunidades por sector.
                </p>
            </div>

            <div class="toolbar">
                <button type="button"
                        class="btn btn-search"
                        data-bs-toggle="modal"
                        data-bs-target="#buscarunaempresaModal">
                    <img src="{{ asset('img/icon/document.svg') }}" alt="">
                    Buscar empresa
                </button>

                <button type="button"
                        class="btn btn-search"
                        data-bs-toggle="modal"
                        data-bs-target="#buscarsectorempresaModal">
                    <img src="{{ asset('img/icon/document.svg') }}" alt="">
                    Buscar por sector
                </button>
            </div>
        </div>

        <div class="map-wrapper">
            <div class="map-container">
                <iframe
                    id="mapa"
                    title="Mapa de empresas en Santiago"
                    src="https://www.google.com/maps?q=Santiago,Chile&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="map-caption">
                <span class="map-dot"></span>
                Mapa interactivo · Santiago, Chile
            </div>
        </div>

        <div id="infoEmpresa" aria-live="polite"></div>
    </section>

    {{-- LISTADO --}}
    <section class="section-card">
        <div class="section-header">
            <div>
                <h2 class="section-title">Directorio de empresas</h2>
                <p class="section-description">
                    Consulta y gestiona los datos comerciales registrados.
                </p>
            </div>
            <span class="badge text-bg-light border">
                {{ count($empresa) }} registros
            </span>
        </div>

        <div class="table-section-body">
            <div class="table-responsive">
                <table class="table table-hover"
                       id="myTable">
                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Sitio web</th>
                            <th>Razón social</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($empresa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="company-rut">
                                        {{ $item->rut ?: '—' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="company-name">
                                        {{ $item->nombre }}
                                    </div>
                                </td>

                                <td>
                                    @if ($item->ubicacion)
                                        <a class="contact-link"
                                           href="https://www.google.com/maps/search/?api=1&query={{ urlencode($item->ubicacion) }}"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            <span>📍</span>
                                            {{ $item->ubicacion }}
                                        </a>
                                    @else
                                        <span class="empty-value">Sin ubicación</span>
                                    @endif
                                </td>

                                <td>
                                    @php
                                        $telefonoOriginal = $item->fono ?? '';
                                        $telefono = preg_replace('/\D/', '', $telefonoOriginal);

                                        if ($telefono && !str_starts_with($telefono, '56')) {
                                            $telefono = '56' . $telefono;
                                        }

                                        $mensajeWhatsApp = urlencode(
                                            "Hola {$item->nombre}, estuve viendo {$item->razon_social}. "
                                            . "Estoy desarrollando herramientas para ayudar a negocios "
                                            . "a organizar sus clientes y ventas. Si te interesa, "
                                            . "te puedo mostrar cómo funciona."
                                        );
                                    @endphp

                                    @if ($telefono)
                                        <a class="contact-link"
                                           href="https://wa.me/{{ $telefono }}?text={{ $mensajeWhatsApp }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           title="Contactar por WhatsApp">
                                            <span>💬</span>
                                            {{ $telefonoOriginal }}
                                        </a>
                                    @else
                                        <span class="empty-value">Sin teléfono</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->correo)
                                        <a class="contact-link"
                                           href="mailto:{{ $item->correo }}"
                                           title="Enviar correo">
                                            <span>✉️</span>
                                            {{ $item->correo }}
                                        </a>
                                    @else
                                        <span class="empty-value">Sin correo</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->url)
                                        <a class="contact-link"
                                           href="{{ \Illuminate\Support\Str::startsWith($item->url, ['http://', 'https://']) ? $item->url : 'https://' . $item->url }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           title="Visitar sitio web">
                                            🌐 Visitar web
                                        </a>
                                    @else
                                        <span class="empty-value">Sin sitio web</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->razon_social ?: '—' }}
                                </td>

                                <td>
                                    <div class="action-group">
                                        <a class="action-btn"
                                           href="{{ route('Empresa.edit', $item->id) }}"
                                           title="Editar empresa"
                                           aria-label="Editar {{ $item->nombre }}">
                                            <svg width="16" height="16"
                                                 viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="1.8"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 aria-hidden="true">
                                                <path d="M12 20h9"/>
                                                <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"/>
                                            </svg>
                                        </a>

                                        <a class="action-btn delete"
                                           href="{{ route('Empresa.show', $item->id) }}"
                                           title="Eliminar empresa"
                                           aria-label="Eliminar {{ $item->nombre }}">
                                            <svg width="16" height="16"
                                                 viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="1.8"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 aria-hidden="true">
                                                <path d="M3 6h18"/>
                                                <path d="M8 6V4h8v2"/>
                                                <path d="m19 6-1 14H6L5 6"/>
                                                <path d="M10 11v5M14 11v5"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="mb-2 fs-3">🏢</div>
                                    <div class="fw-bold text-dark">
                                        No hay empresas registradas
                                    </div>
                                    <p class="text-muted small mb-0 mt-1">
                                        Agrega una empresa para comenzar a gestionar tu directorio.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
    const empresas = @json($empresa);

    function buscar() {
        const input = document.getElementById('busqueda');
        const mapa = document.getElementById('mapa');
        const info = document.getElementById('infoEmpresa');

        if (!input || !mapa || !info) {
            console.warn('No se encontró el campo de búsqueda, el mapa o el panel de resultados.');
            return;
        }

        const lugar = input.value.trim().toLowerCase();

        if (!lugar) {
            info.replaceChildren();
            return;
        }

        const empresa = empresas.find(e =>
            (e.nombre || '').toLowerCase().includes(lugar)
        );

        if (!empresa) {
            mapa.src = 'https://www.google.com/maps?q='
                + encodeURIComponent(input.value.trim())
                + '&output=embed';

            info.textContent = '';

            const mensaje = document.createElement('div');
            mensaje.className = 'alert alert-info mb-0';
            mensaje.textContent =
                'No se encontró la empresa en la base de datos. '
                + 'Se muestran resultados relacionados en Google Maps.';

            info.appendChild(mensaje);
            return;
        }

        mapa.src = 'https://www.google.com/maps?q='
            + encodeURIComponent(
                [empresa.nombre, empresa.ubicacion, 'Chile']
                    .filter(Boolean)
                    .join(', ')
            )
            + '&output=embed';

        info.textContent = '';

        const tarjeta = document.createElement('div');
        tarjeta.className = 'card';

        const titulo = document.createElement('h3');
        titulo.className = 'h6 fw-bold mb-3';
        titulo.textContent = empresa.nombre || 'Empresa';

        tarjeta.appendChild(titulo);

        const telefonoOriginal = empresa.fono || '';
        let telefono = telefonoOriginal.replace(/\D/g, '');

        if (telefono && !telefono.startsWith('56')) {
            telefono = '56' + telefono;
        }

        const crearDato = (texto, href, etiqueta) => {
            const p = document.createElement('p');
            p.className = 'mb-2';

            if (href) {
                const a = document.createElement('a');
                a.href = href;
                a.textContent = texto;
                a.className = 'contact-link';
                a.target = '_blank';
                a.rel = 'noopener noreferrer';
                a.setAttribute('aria-label', etiqueta || texto);
                p.appendChild(a);
            } else {
                p.textContent = texto;
            }

            tarjeta.appendChild(p);
        };

        crearDato(
            empresa.ubicacion || 'Ubicación no disponible',
            empresa.ubicacion
                ? 'https://www.google.com/maps/search/?api=1&query='
                    + encodeURIComponent(empresa.ubicacion)
                : ''
        );

        crearDato(
            telefonoOriginal
                ? 'Teléfono: ' + telefonoOriginal
                : 'Teléfono no disponible',
            telefono
                ? 'https://wa.me/' + telefono + '?text='
                    + encodeURIComponent(
                        'Hola ' + empresa.nombre
                        + ', vi su empresa y me gustaría ofrecer soluciones tecnológicas.'
                    )
                : '',
            'Contactar por WhatsApp'
        );

        crearDato(
            empresa.correo || 'Correo no disponible',
            empresa.correo ? 'mailto:' + empresa.correo : ''
        );

        if (empresa.url) {
            let url = empresa.url.trim();

            if (!/^https?:\/\//i.test(url)) {
                url = 'https://' + url;
            }

            crearDato('🌐 ' + empresa.url, url, 'Visitar sitio web');
        } else {
            crearDato('Sitio web no disponible', '');
        }

        info.appendChild(tarjeta);
    }
</script>

@endsection
