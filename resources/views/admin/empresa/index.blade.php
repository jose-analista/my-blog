@extends ('layouts.inc.admin')

@section('content')

@include('admin.empresa.create-modal')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Empresa
                </h4>
            </div>
                  {{-- Busqueda especifica --}}
                            <button class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal"
                                data-bs-target="#buscarunaempresaModal">

                                <img src="{{ asset('img/icon/document.svg') }}" width="20" height="20">

                                Buscar una empresa

                            </button>
                            @include('admin.empresa.modal.buscarespecifico')

                               {{-- Busqueda por sector --}}
                            <button class="btn btn-success btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal"
                                data-bs-target="#buscarsectorempresaModal">

                                <img src="{{ asset('img/icon/document.svg') }}" width="20" height="20">

                                Buscar por sector

                            </button>
                            @include('admin.empresa.modal.buscarsector')






<iframe 
  id="mapa"
  width="100%" 
  height="600" 
  style="border:0"
  loading="lazy"
  src="https://www.google.com/maps?q=Santiago,Chile&output=embed">
</iframe>
<script>
    let empresas = @json($empresa);
</script>
<script>
function buscar() {
    let lugar = document.getElementById("busqueda").value.toLowerCase();

    let empresa = empresas.find(e => 
        e.nombre.toLowerCase().includes(lugar)
    );

    if (!empresa) {

    // 🔎 Buscar igual en Google Maps con lo que escribió el usuario
    document.getElementById("mapa").src =
        "https://www.google.com/maps?q=" + encodeURIComponent(lugar) + "&output=embed";

    document.getElementById("infoEmpresa").innerHTML = `
        <div class="card p-2">
            ❌ Empresa no encontrada en la base de datos<br>
            🔎 Mostrando resultado en Google Maps
        </div>
    `;

    return;
}

    // MAPA
    document.getElementById("mapa").src =
        "https://www.google.com/maps?q=" + encodeURIComponent(empresa.nombre) + "&output=embed";

    // 📞 TELÉFONO
    let telefono = empresa.fono ? empresa.fono.replace(/\D/g, '') : "";

    if (telefono && !telefono.startsWith("56")) {
        telefono = "56" + telefono;
    }

    let telefonoTexto = telefono 
        ? `📞 ${empresa.fono}` 
        : "📞 No hay número";

    // 🌐 WEB
    let webTexto = empresa.url && empresa.url.trim() !== "" 
        ? `🌐 <a href="${empresa.url}" target="_blank">${empresa.url}</a>` 
        : "🌐 No hay web";

    // 💬 MENSAJE WHATSAPP
    let mensaje = encodeURIComponent(
        `Hola ${empresa.nombre}, vi su empresa y me gustaría ofrecer soluciones tecnológicas 👋`
    );

    let whatsappBtn = telefono 
        ? `<a href="https://wa.me/${telefono}?text=${mensaje}" target="_blank" class="btn btn-success mt-2">💬 WhatsApp</a>`
        : `<div class="text-muted mt-2">WhatsApp no disponible</div>`;

    // MOSTRAR
    document.getElementById("infoEmpresa").innerHTML = `
        <div class="card p-2">
            <strong>${empresa.nombre}</strong><br>
            ${telefonoTexto}<br>
            ${webTexto}<br>
            ${whatsappBtn}
        </div>
    `;
}
</script>
       <button 
    type="button"
    class="btn btn-primary float-end d-flex align-items-center gap-2 px-4 py-2 rounded-3 shadow-sm"
    data-bs-toggle="modal"
    data-bs-target="#staticBackdrop">

    <img 
        src="{{ asset('img/icon/add.svg') }}" 
        alt="Agregar"
        width="20"
        height="20">

    <span>Agregar Empresa</span>

</button>
            <div class="card-body">
             

           <!-- Button trigger modal -->
         
                <div class="table-responsive">
                   
                    <table class="table table-bordered display" id="myTable">
                        <div id="dvData">
                            <thead>
                                <th class="text-white">N.</th>
                                <th class="text-white">Rut</th>
                                <th class="text-white">Nombre</th>
                                <th class="text-white">Ubicación</th>
                                <th class="text-white">Teléfono</th>
                                <th class="text-white">Correo</th>
                                <th class="text-white">URL</th>
                                <th class="text-white">Razon Social</th>
                                <th class="text-white">Acciones</th>
                            </thead>
                            <tbody>
                                <?php
                                $contandor = 1;
                                ?>
                                @forelse ($empresa as $item)
                                <tr>
                                    <!-- para imprimir debe ser igual los nombre de los campos de la tabla -->
                                    <td><?php echo $contandor?></td>
                                    <td>{{ $item->rut }} </td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->ubicacion }}</td>
                                    <td>
    @php
        // Limpiar número (sacar +, espacios, guiones, etc.)
        $telefono = preg_replace('/[^0-9]/', '', $item->fono);

        // Si no tiene código país, agregar Chile (56)
        if (substr($telefono, 0, 2) != '56') {
            $telefono = '56' . $telefono;
        }

        // Mensaje opcional
        $mensaje = urlencode("Hola {$item->nombre}, estuve viendo {$item->razon_social} 👋. 
Estoy desarrollando herramientas para ayudar a negocios a organizar sus clientes y ventas. 
Si te interesa, te puedo mostrar cómo funciona.");
    @endphp

    <a href="https://wa.me/{{ $telefono }}?text={{ $mensaje }}" target="_blank">
        {{ $item->fono }}
    </a>
</td>
                                    @php
    $asunto = urlencode("Consulta sobre su empresa");
    $mensaje = urlencode("Hola {$item->nombre}, vi su empresa y me gustaría ofrecer soluciones tecnológicas.");
@endphp

<td>
    @if($item->correo)

        <a href="mailto:{{ $item->correo }}">
            ✉️ {{ $item->correo }}
        </a>
        |
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item->correo }}" target="_blank">
            🌐 Abrir en Gmail
        </a>
        <!-- <a href="https://outlook.live.com/owa/?path=/mail/action/compose&to={{ $item->correo }}&subject={{ $asunto }}&body={{ $mensaje }}" target="_blank">
    🌐 Outlook
</a> -->

    @else
        No hay correo
    @endif
</td>
                                    <td>
    <a href="{{ $item->url }}" target="_blank">
        {{ $item->url }}
    </a>
</td>
                                    <td>{{ $item->razon_social }}</td>
                                    <td>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-outline-secondary" href="{{ route('Empresa.edit', $item->id) }}"
                                                role="button">Editar</a>
                                            <a class="btn btn-danger" href="{{ route('Empresa.show', $item->id) }}"
                                                role="button">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
            $contandor++;
                                ?>
                                @empty
                                <!--
    <tr>
                                <div>
                                    <h1>No hay productos</h1>
                                </div>
                            </tr>

                              -->
                                @endforelse
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection