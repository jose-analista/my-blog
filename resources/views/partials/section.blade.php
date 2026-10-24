<!-- ======= HERO ======= -->
<section id="hero"
    class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-950 pt-24 pb-16">

    <!-- Fondo decorativo -->
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-blue-500/20 blur-3xl"></div>
    </div>

    <div class="relative z-10 px-6 text-center">

        <div class="mb-8 flex justify-center">
            <img src="{{ asset('assets/img/img1.jpg') }}" alt="Foto de José Calderón" width="160" height="160"
                class="h-40 w-40 rounded-full border-4 border-cyan-400 object-cover shadow-2xl transition duration-500 hover:scale-105 motion-reduce:transition-none motion-reduce:hover:scale-100">
        </div>

        <h1 class="mb-6 text-5xl font-extrabold tracking-tight text-white md:text-7xl">
            José Calderón
        </h1>

        <p class="text-xl font-light text-slate-300 md:text-3xl">
            Yo soy
            <span class="typed font-semibold text-cyan-400"
                data-typed-items="Analista Programador :), Desarrollador Laravel 🚀, Full Stack Developer 💻"></span>
        </p>

        <p class="mx-auto mt-6 max-w-2xl text-base leading-7 text-slate-400 md:text-lg">
            Construyo sistemas web, APIs y automatizaciones con Laravel y Linux.
        </p>

        <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">
            <a href="#portfolio"
                class="rounded-2xl bg-cyan-500 px-8 py-4 font-semibold text-slate-950 shadow-lg transition hover:bg-cyan-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                Ver portafolio
            </a>

            <a href="#contact"
                class="rounded-2xl border border-white/20 px-8 py-4 font-semibold text-white backdrop-blur-sm transition hover:border-cyan-400 hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">
                Contactarme
            </a>

            <a href="https://github.com/jose-analista" target="_blank" rel="noopener noreferrer"
                class="rounded-2xl border border-white/20 px-8 py-4 font-semibold text-white backdrop-blur-sm transition hover:border-cyan-400 hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300">
                GitHub
            </a>
        </div>

    </div>
</section>
<!-- End Hero -->

<main id="main" class="bg-slate-950 text-white">

    <!-- ===== SOBRE MÍ ===== -->
    <section id="about" class="scroll-mt-24 py-24">
        <div class="mx-auto max-w-7xl px-6">

            <div class="mb-16 text-center">
                <h2 class="mb-6 text-4xl font-bold text-white md:text-5xl">Sobre mí</h2>
                <div class="mx-auto h-1 w-24 rounded-full bg-cyan-400"></div>

                <p class="mx-auto mt-8 max-w-3xl text-lg leading-8 text-slate-300">
                    Soy José Miguel, analista programador con experiencia en desarrollo web,
                    aplicaciones móviles y automatización de procesos. He trabajado con PHP,
                    Laravel, Java, SQL, JSON y XML, creando soluciones modernas, escalables
                    y funcionales.
                </p>
            </div>

            <div class="grid items-center gap-16 lg:grid-cols-2">

                <!-- Imagen -->
                <div class="relative">
                    <img src="{{ asset('assets/img/fondo.jpg') }}" alt="José Calderón trabajando" loading="lazy"
                        class="w-full rounded-3xl border border-slate-800 object-cover shadow-2xl">

                    <div class="absolute -bottom-6 -right-6 rounded-2xl bg-cyan-500 p-6 text-slate-950 shadow-xl">
                        <h3 class="text-3xl font-bold">Full Stack Developer</h3>
                        {{-- <p class="text-sm font-medium">Full Stack Developer</p> --}}
                    </div>
                </div>

                <!-- Información -->
                <div>
                    <h3 class="mb-8 text-3xl font-bold text-cyan-400 md:text-4xl">
                        Analista Programador &amp; Desarrollador Web
                    </h3>

                    <dl class="grid gap-6 text-slate-300 sm:grid-cols-2">

                        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                            <dt class="font-bold text-white">Formación</dt>
                            <dd>Analista Programador</dd>
                        </div>

                        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                            <dt class="font-bold text-white">Ciudad</dt>
                            <dd>Santiago, Chile</dd>
                        </div>

                        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
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

                        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                            <dt class="font-bold text-white">Sitio web</dt>
                            <dd>
                                <a href="{{ route('Welcome') }}" class="text-cyan-400 hover:text-cyan-300">
                                    www.joseti.com
                                </a>
                            </dd>
                        </div>

                    </dl>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== ESTADÍSTICAS ===== -->
    @php
        $estadisticas = [
            ['emoji' => '😊', 'valor' => count($cliente), 'etiqueta' => 'Clientes'],
            ['emoji' => '🚀', 'valor' => count($proyecto), 'etiqueta' => 'Proyectos'],
            ['emoji' => '💻', 'valor' => count($tecnologia), 'etiqueta' => 'Tecnologías'],
            ['emoji' => '🏢', 'valor' => count($empresa), 'etiqueta' => 'Empresas'],
        ];
    @endphp

    <section id="resume" class="scroll-mt-24 bg-slate-900 py-24">
        <div class="mx-auto max-w-7xl px-6">

            <div class="mb-16 text-center">
                <h2 class="mb-6 text-4xl font-bold text-white md:text-5xl">Estadísticas</h2>
                <p class="text-lg text-slate-400">Clientes, proyectos y tecnologías desarrolladas.</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($estadisticas as $stat)
                    <div class="rounded-3xl border border-slate-800 bg-slate-950 p-10 text-center">
                        <div class="mb-4 text-6xl" aria-hidden="true">{{ $stat['emoji'] }}</div>
                        <p class="text-5xl font-bold text-cyan-400">{{ $stat['valor'] }}</p>
                        <p class="mt-4 text-slate-300">{{ $stat['etiqueta'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ===== HABILIDADES ===== -->
    <section id="skills" class="scroll-mt-24 py-24">
        <div class="mx-auto max-w-7xl px-6">

            <div class="mb-16 text-center">
                <h2 class="mb-6 text-4xl font-bold text-white md:text-5xl">Habilidades</h2>
                <p class="text-lg text-slate-400">Tecnologías que domino y uso en mis proyectos.</p>
            </div>

            <div class="grid grid-cols-2 gap-6 md:grid-cols-4 lg:grid-cols-6">

                @forelse ($tecnologia as $item)
                    <div
                        class="flex items-center justify-center rounded-3xl border border-slate-800 bg-slate-900 p-6 transition hover:border-cyan-500 hover:bg-slate-800">
                        <img src="{{ asset($item->imagen) }}" alt="{{ $item->nombre ?? 'Tecnología' }}"
                            title="{{ $item->nombre ?? '' }}" loading="lazy" class="h-20 w-20 object-contain">
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-slate-700 bg-slate-900 p-6 text-center text-slate-400">
                        Aún no hay habilidades registradas. Agrégalas desde el panel de administración.
                    </div>
                @endforelse

            </div>

        </div>
    </section>

    <!-- ===== PORTAFOLIO ===== -->
    <section id="portfolio" class="scroll-mt-24 bg-slate-900 py-24">
        <div class="mx-auto max-w-7xl px-6">

            <div class="mb-16 text-center">
                <h2 class="mb-6 text-4xl font-bold text-white md:text-5xl">Portafolio</h2>
                <p class="text-lg text-slate-400">Proyectos desarrollados y experiencias profesionales.</p>
            </div>

            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">

                @forelse ($proyecto as $item)
                    <article
                        class="flex flex-col overflow-hidden rounded-3xl border border-slate-800 bg-slate-950 transition hover:border-cyan-500">

                        <div class="overflow-hidden">
                            <img src="{{ asset($item->imagen) }}" alt="Captura del proyecto {{ $item->nombre }}"
                                loading="lazy"
                                class="h-60 w-full object-cover transition duration-500 hover:scale-105 motion-reduce:transition-none motion-reduce:hover:scale-100">
                        </div>

                        <div class="flex flex-1 flex-col p-8">
                            <h3 class="mb-3 text-2xl font-bold text-white">{{ $item->nombre }}</h3>

                            @if (!empty($item->descripcion))
                                <p class="mb-6 line-clamp-3 text-slate-400">{{ $item->descripcion }}</p>
                            @endif

                            <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer"
                                class="mt-auto inline-block self-start rounded-xl bg-cyan-500 px-6 py-3 font-semibold text-slate-950 transition hover:bg-cyan-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300"
                                aria-label="Ver proyecto {{ $item->nombre }} (se abre en una pestaña nueva)">
                                Ver proyecto
                            </a>
                        </div>

                    </article>
                @empty
                    <div class="col-span-full rounded-2xl border border-slate-700 bg-slate-950 p-6 text-center text-slate-400">
                        Todavía no hay proyectos publicados.
                    </div>
                @endforelse

            </div>

        </div>
    </section>

    <!-- ===== SERVICIOS ===== -->
    @php
        $servicios = [
            [
                'titulo' => 'Desarrollo web',
                'texto' => 'Sistemas web modernos con Laravel y TailwindCSS: APIs, paneles administrativos y automatización.',
                'bg' => 'bg-cyan-500/10',
                'color' => 'text-cyan-400',
                'icono' => 'M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5',
            ],
            [
                'titulo' => 'Servidores Linux',
                'texto' => 'Configuración de VPS y hosting con Docker y Nginx; seguridad, despliegue de Laravel y optimización.',
                'bg' => 'bg-emerald-500/10',
                'color' => 'text-emerald-400',
                'icono' => 'M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z',
            ],
            [
                'titulo' => 'APIs e integraciones',
                'texto' => 'Creación e integración de APIs REST, autenticación JWT, pagos online y servicios externos.',
                'bg' => 'bg-purple-500/10',
                'color' => 'text-purple-400',
                'icono' => 'M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5',
            ],
            [
                'titulo' => 'Automatización',
                'texto' => 'Optimización de procesos con software, bots, tareas programadas y paneles de control.',
                'bg' => 'bg-orange-500/10',
                'color' => 'text-orange-400',
                'icono' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z',
            ],
            [
                'titulo' => 'IA y software',
                'texto' => 'Integración de inteligencia artificial con Ollama, automatización con IA y asistentes inteligentes.',
                'bg' => 'bg-pink-500/10',
                'color' => 'text-pink-400',
                'icono' => 'M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z',
            ],
            [
                'titulo' => 'Soporte técnico',
                'texto' => 'Soporte remoto, mantenimiento de sistemas, respaldos, monitoreo y solución de problemas.',
                'bg' => 'bg-red-500/10',
                'color' => 'text-red-400',
                'icono' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',
            ],
        ];
    @endphp

    <section id="services" class="scroll-mt-24 py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mb-16 text-center">
                <h2 class="text-4xl font-black text-white md:text-5xl">Soluciones tecnológicas</h2>

                <p class="mx-auto mt-6 max-w-3xl text-lg leading-relaxed text-slate-400">
                    Desarrollo soluciones de automatización, sistemas web, infraestructura Linux
                    y experiencia digital.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">

                @foreach ($servicios as $servicio)
                    <div
                        class="rounded-3xl border border-slate-800 bg-slate-900 p-8 shadow-xl transition duration-300 hover:border-cyan-500">

                        <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl {{ $servicio['bg'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 {{ $servicio['color'] }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $servicio['icono'] }}" />
                            </svg>
                        </div>

                        <h3 class="mb-4 text-2xl font-bold text-white">{{ $servicio['titulo'] }}</h3>
                        <p class="leading-relaxed text-slate-400">{{ $servicio['texto'] }}</p>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- ===== CONTACTO ===== -->
    <section id="contact" class="scroll-mt-24 bg-slate-900 py-24">
        <div class="mx-auto max-w-6xl px-6">

            <div class="mb-16 text-center">
                <h2 class="mb-6 text-4xl font-bold text-white md:text-5xl">Contacto</h2>
                <p class="text-lg text-slate-400">Cuéntame qué necesitas y te respondo por correo.</p>
            </div>

            @if ($mensaje = session('success'))
                <div role="status"
                    class="mb-10 rounded-2xl border border-green-400 bg-green-500/20 px-6 py-4 text-green-300 shadow-lg">
                    {{ $mensaje }}
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-2">

                <!-- Información -->
                <div class="rounded-3xl border border-slate-800 bg-slate-950 p-10">
                    <div class="space-y-8">

                        <div>
                            <h3 class="mb-2 text-xl font-bold text-cyan-400">Correo</h3>
                            <a href="mailto:jose.calderon15@inacapmail.cl"
                                class="break-all text-slate-300 hover:text-cyan-300">
                                jose.calderon15@inacapmail.cl
                            </a>
                        </div>

                        <div>
                            <h3 class="mb-2 text-xl font-bold text-cyan-400">Teléfono</h3>
                            <a href="tel:+56935629178" class="text-slate-300 hover:text-cyan-300">
                                +56 9 3562 9178
                            </a>
                        </div>

                        <div>
                            <h3 class="mb-2 text-xl font-bold text-cyan-400">Ubicación</h3>
                            <p class="text-slate-300">Santiago, Chile</p>
                        </div>

                    </div>
                </div>

                <!-- Formulario -->
                <div class="rounded-3xl border border-slate-800 bg-slate-950 p-10">

                    @guest
                        <div class="rounded-2xl border border-slate-700 bg-slate-900 p-6 text-slate-300">
                            Para enviar un mensaje,
                            <a href="{{ route('register') }}" class="font-semibold text-cyan-400 underline">regístrate</a>
                            o
                            <a href="{{ route('login') }}" class="font-semibold text-cyan-400 underline">inicia sesión</a>.
                        </div>
                    @else
                        <form action="{{ route('Contacto.store') }}" method="POST" class="space-y-6" novalidate>
                            @csrf

                            <div>
                                <label for="asunto" class="mb-2 block text-slate-300">Asunto</label>
                                <input type="text" id="asunto" name="asunto" value="{{ old('asunto') }}" required
                                    maxlength="120" placeholder="Trabajo para un sitio web"
                                    @error('asunto') aria-invalid="true" aria-describedby="asunto-error" @enderror
                                    class="w-full rounded-2xl border bg-slate-900 px-5 py-4 text-white placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400 @error('asunto') border-red-500 @else border-slate-700 @enderror">
                                @error('asunto')
                                    <p id="asunto-error" class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="mensaje" class="mb-2 block text-slate-300">Mensaje</label>
                                <textarea id="mensaje" name="mensaje" rows="6" required maxlength="2000"
                                    placeholder="Necesito un sistema para..."
                                    @error('mensaje') aria-invalid="true" aria-describedby="mensaje-error" @enderror
                                    class="w-full rounded-2xl border bg-slate-900 px-5 py-4 text-white placeholder-slate-500 focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400 @error('mensaje') border-red-500 @else border-slate-700 @enderror">{{ old('mensaje') }}</textarea>
                                @error('mensaje')
                                    <p id="mensaje-error" class="mt-2 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full rounded-2xl bg-cyan-500 py-4 font-bold text-slate-950 transition hover:bg-cyan-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                Enviar mensaje
                            </button>
                        </form>
                    @endguest

                </div>

            </div>

        </div>
    </section>

</main>