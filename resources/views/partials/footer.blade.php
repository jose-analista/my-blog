@php
    $redes = [
        ['nombre' => 'Facebook', 'url' => 'https://web.facebook.com/jose.miguelcalderon.9/', 'icono' => 'bxl-facebook'],
        ['nombre' => 'Instagram', 'url' => 'https://www.instagram.com/_pantera616_/', 'icono' => 'bxl-instagram'],
        ['nombre' => 'LinkedIn', 'url' => 'https://www.linkedin.com/', 'icono' => 'bxl-linkedin'],
        ['nombre' => 'GitHub', 'url' => 'https://github.com/JOSE616MIGUEL', 'icono' => 'bxl-github'],
    ];

    $navegacion = [
        ['texto' => 'Inicio', 'ancla' => 'hero'],
        ['texto' => 'Sobre mí', 'ancla' => 'about'],
        ['texto' => 'Habilidades', 'ancla' => 'skills'],
        ['texto' => 'Portafolio', 'ancla' => 'portfolio'],
        ['texto' => 'Servicios', 'ancla' => 'services'],
        ['texto' => 'Contacto', 'ancla' => 'contact'],
    ];

    $tecnologias = ['Laravel', 'PHP', 'Linux', 'Tailwind', 'MySQL', 'IA'];
@endphp

<!-- ======= Footer ======= -->
<footer class="border-t border-slate-800 bg-slate-950">

    <div class="mx-auto max-w-7xl px-6 py-14 lg:px-8">

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">

            <!-- Información -->
            <div>
                <h2 class="text-2xl font-bold text-white">José Calderón</h2>

                <p class="mt-4 leading-relaxed text-slate-400">
                    Analista programador especializado en desarrollo web, Laravel, Linux
                    y automatización de procesos.
                </p>

                <ul class="mt-6 flex gap-3">
                    @foreach ($redes as $red)
                        <li>
                            <a href="{{ $red['url'] }}" target="_blank" rel="noopener noreferrer"
                                aria-label="{{ $red['nombre'] }} (se abre en una pestaña nueva)"
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-white transition hover:bg-cyan-500 hover:text-slate-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">
                                <i class="bx {{ $red['icono'] }} text-xl" aria-hidden="true"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Navegación -->
            <nav aria-label="Navegación del pie de página">
                <h3 class="mb-5 text-lg font-semibold text-white">Navegación</h3>

                <ul class="space-y-3">
                    @foreach ($navegacion as $enlace)
                        <li>
                            <a href="{{ route('Welcome') }}#{{ $enlace['ancla'] }}"
                                class="text-slate-400 transition hover:text-cyan-400 focus:outline-none focus-visible:text-cyan-400 focus-visible:underline">
                                {{ $enlace['texto'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <!-- Tecnologías -->
            <div>
                <h3 class="mb-5 text-lg font-semibold text-white">Tecnologías</h3>

                <ul class="flex flex-wrap gap-3">
                    @foreach ($tecnologias as $tec)
                        <li class="rounded-lg bg-slate-800 px-3 py-1 text-sm text-cyan-400">
                            {{ $tec }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contacto -->
            <div>
                <h3 class="mb-5 text-lg font-semibold text-white">Contacto</h3>

                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm text-slate-500">Correo</dt>
                        <dd>
                            <a href="mailto:jose.calderon15@inacapmail.cl"
                                class="break-all text-slate-300 transition hover:text-cyan-400">
                                jose.calderon15@inacapmail.cl
                            </a>
                        </dd>
                    </div>

                  
                        <div class="">
    <dt class="font-bold text-white">WhatsApp</dt>
    <dd>
        <a href="https://wa.me/56972201918?text={{ urlencode('Hola José, vi tu portafolio y quiero conversar contigo.') }}"
            target="_blank" rel="noopener noreferrer"
            aria-label="Escribir por WhatsApp (se abre en una pestaña nueva)"
            class="hover:text-cyan-300">
            +56 9 7220 1918
        </a>
    </dd>
</div>

                    <div>
                        <dt class="text-sm text-slate-500">Ubicación</dt>
                        <dd class="text-slate-300">Santiago, Chile</dd>
                    </div>
                </dl>
            </div>

        </div>

        <!-- Línea inferior -->
        <div class="mt-12 border-t border-slate-800 pt-6">
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">

                <p class="text-center text-sm text-slate-500 md:text-left">
                    © {{ date('Y') }} José Calderón. Todos los derechos reservados.
                </p>

                <div class="flex items-center gap-6">
                    <p class="text-sm text-slate-500">Hecho con Laravel y Tailwind CSS</p>

                    <a href="#top"
                        class="rounded-lg border border-slate-700 px-3 py-1 text-sm text-slate-300 transition hover:border-cyan-400 hover:text-cyan-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">
                        Volver arriba
                    </a>
                </div>

            </div>
        </div>

    </div>

</footer>