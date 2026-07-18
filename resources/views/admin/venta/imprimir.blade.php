{{-- resources/views/venta/imprimir.blade.php --}}

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Factura #{{ $venta->id }}
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background:#eef2f7;
            font-family: Arial, Helvetica, sans-serif;
        }

        .invoice-container{
            max-width:1100px;
            margin:auto;
        }

        .invoice-card{
            background:white;
            border-radius:24px;
            overflow:hidden;
            box-shadow:0 10px 40px rgba(0,0,0,.08);
        }

        .invoice-header{
            background:linear-gradient(135deg,#111827,#1f2937);
            color:white;
            padding:50px;
        }

        .logo-box{
            width:75px;
            height:75px;
            border-radius:20px;
            background:rgba(255,255,255,.1);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
        }

        .status-paid{
            background:#dcfce7;
            color:#166534;
            padding:10px 18px;
            border-radius:50px;
            font-size:14px;
            font-weight:bold;
            display:inline-block;
        }

        .info-card{
            background:#f8fafc;
            border-radius:18px;
            padding:25px;
            height:100%;
        }

        .table thead{
            background:#111827;
            color:white;
        }

        .table td,
        .table th{
            vertical-align:middle;
            padding:18px;
        }

        .service-icon{
            width:45px;
            height:45px;
            border-radius:12px;
            background:#eff6ff;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#2563eb;
        }

        .summary-box{
            background:#111827;
            color:white;
            border-radius:22px;
            padding:35px;
        }

        .summary-item{
            display:flex;
            justify-content:space-between;
            margin-bottom:12px;
        }

        .footer-note{
            background:#f8fafc;
            border-radius:18px;
            padding:25px;
        }

        @media print{

            .no-print{
                display:none !important;
            }

            body{
                background:white;
            }

            .invoice-card{
                box-shadow:none;
            }

        }

    </style>

</head>

<body>

<div class="container py-5 invoice-container">

    <div class="invoice-card">

        {{-- HEADER --}}
        <div class="invoice-header">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <div class="d-flex align-items-center gap-4">

                        <div class="logo-box">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>

                        <div>

                            <h1 class="fw-bold mb-1">
                                FACTURA DIGITAL
                            </h1>

                            <p class="mb-0 opacity-75">
                                Sistema profesional de ventas y servicios
                            </p>
                            <div class="summary-item align-items-center">

    <span>
        IVA (%)
    </span>

    <input
        type="number"
        id="ivaInput"
        class="form-control text-end"
        value="19"
        min="0"
        max="100"
        style="width:100px;"
    >

</div>


                        </div>

                    </div>

                </div>

                <div class="col-md-4 text-md-end mt-4 mt-md-0">

                    <div class="status-paid mb-3">
                        <i class="fa-solid fa-circle-check"></i>
                        Pagado
                    </div>

                    <h3 class="fw-bold mb-1">
                        #{{ $venta->id }}
                    </h3>

                    <small class="opacity-75">

                        {{ $venta->created_at->format('d/m/Y H:i') }}

                    </small>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-5">

            {{-- INFO --}}
            <div class="row g-4 mb-5">

                <div class="col-md-4">

                    <div class="info-card">

                        <small class="text-muted text-uppercase">
                            Cliente
                        </small>

                        <h5 class="fw-bold mt-2">
                            {{ $venta->cliente->nombre }}
                        </h5>

                        <p class="text-muted mb-0">
                            Cliente registrado en sistema
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card">

                        <small class="text-muted text-uppercase">
                            Empresa
                        </small>

                        <h5 class="fw-bold mt-2">

                            {{ optional($venta->empresa)->nombre ?? 'Sin empresa' }}

                        </h5>

                        <p class="text-muted mb-0">
                            Relación comercial asociada
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card">

                        <small class="text-muted text-uppercase">
                            Proyecto
                        </small>

                        <h5 class="fw-bold mt-2">

                            {{ optional($venta->proyecto)->nombre ?? 'Sin proyecto' }}

                        </h5>

                        <p class="text-muted mb-0">
                            Proyecto vinculado a la venta
                        </p>

                    </div>

                </div>

            </div>

            {{-- TABLA --}}
            <div class="table-responsive mb-5">

                <table class="table table-bordered align-middle">

                    <thead>

                        <tr>
                            <th>Servicio</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Tarifa</th>
                            <th>Total</th>
                        </tr>

                    </thead>

                    <tbody>

                        @php
                            $subtotal = 0;
                        @endphp

                        @foreach($venta->servicios as $servicio)

                        @php
                            $totalServicio =
                            $servicio->tarifa_base *
                            $servicio->pivot->cantidad;

                            $subtotal += $totalServicio;
                        @endphp

                        <tr>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="service-icon">

                                        <i class="fa-solid fa-briefcase"></i>

                                    </div>

                                    <div>

                                        <strong>
                                            {{ $servicio->nombre }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            Servicio profesional
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $servicio->categoria }}

                                </span>

                            </td>

                            <td>

                                x{{ $servicio->pivot->cantidad }}

                            </td>

                            <td>

                                ${{ number_format(
                                    $servicio->tarifa_base,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                            <td>

                                <strong>

                                    ${{ number_format(
                                        $totalServicio,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- RESUMEN --}}
            <div class="row">

                <div class="col-md-6 mb-4 mb-md-0">

                    <div class="footer-note h-100">

                        <h5 class="fw-bold mb-3">
                            Información Importante
                        </h5>

                        <ul class="mb-0">

                            <li class="mb-2">
                                Factura generada automáticamente.
                            </li>

                            <li class="mb-2">
                                Todos los servicios fueron registrados en el sistema.
                            </li>

                            <li class="mb-2">
                                Documento válido para control interno y comercial.
                            </li>

                            <li>
                                Gracias por preferir nuestros servicios.
                            </li>

                        </ul>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="summary-box">

                        <h4 class="fw-bold mb-4">
                            Resumen Pago
                        </h4>

                        <div class="summary-item">

    <span>
        Subtotal
    </span>

    <strong
        id="subtotalValor"
        data-subtotal="{{ $subtotal }}"
    >

        ${{ number_format($subtotal, 0, ',', '.') }}

    </strong>

</div>

    <div class="summary-item">
    <span>
        IVA
    </span>

    <strong id="ivaValor">

        $0

    </strong>

</div>

                        <hr class="border-light">

                        <div class="summary-item">

    <h4 class="mb-0">
        Total
    </h4>

    <h3 class="fw-bold mb-0 text-success"
        id="totalFinal">

        $0

    </h3>

</div>

                    </div>

                </div>

            </div>

            {{-- BOTONES --}}
            <div class="d-flex justify-content-end gap-3 mt-5 no-print">

                <a href="{{ url()->previous() }}"
                    class="btn btn-light border rounded-pill px-4">

                    Volver

                </a>

                <button onclick="window.print()"
                    class="btn btn-danger rounded-pill px-5">

                    <i class="fa fa-print"></i>
                    Imprimir

                </button>

            </div>

        </div>

    </div>

</div>

</body>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const ivaInput = document.getElementById('ivaInput');
    const subtotalElement = document.getElementById('subtotalValor');
    const ivaValorElement = document.getElementById('ivaValor');
    const totalFinalElement = document.getElementById('totalFinal');

    let subtotal = parseFloat(
        subtotalElement.dataset.subtotal
    );

    // Cargar IVA guardado
    let ivaGuardado = localStorage.getItem('factura_iva');

    if (ivaGuardado !== null) {

        ivaInput.value = ivaGuardado;
    }

    function calcularFactura() {

        let iva = parseFloat(ivaInput.value) || 0;

        localStorage.setItem('factura_iva', iva);

        let ivaCalculado = subtotal * (iva / 100);

        let totalFinal = subtotal + ivaCalculado;

        ivaValorElement.innerText =
            '$' + ivaCalculado.toLocaleString('es-CL');

        totalFinalElement.innerText =
            '$' + totalFinal.toLocaleString('es-CL');
    }

    ivaInput.addEventListener('input', calcularFactura);

    calcularFactura();

});

</script>

</html>