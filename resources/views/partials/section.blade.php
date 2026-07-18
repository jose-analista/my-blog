<!-- ======= Hero Section ======= -->
<section id="hero"
    class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-950 overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Contenido -->
    <div class="relative z-10 text-center px-6">

        <!-- Imagen perfil -->
        <div class="mb-8 flex justify-center">
            <img src="{{ asset('assets/img/img1.jpg') }}" alt="José Calderón"
                class="w-40 h-40 rounded-full border-4 border-cyan-400 shadow-2xl object-cover hover:scale-105 transition duration-500">
        </div>

        <!-- Nombre -->
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight">
            José Calderón
        </h1>

        <!-- Texto animado -->
        <p class="text-xl md:text-3xl text-gray-300 font-light">
            Yo soy
            <span class="typed text-cyan-400 font-semibold"
                data-typed-items="Analista Programador :), Desarrollador Laravel 🚀, Full Stack Developer 💻">
            </span>
        </p>

        <!-- Botones -->
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">

            <a href="#portfolio"
                class="px-8 py-4 bg-cyan-500 hover:bg-cyan-400 text-white rounded-2xl font-semibold shadow-lg hover:scale-105 transition duration-300">
                Ver Portafolio
            </a>

            <a href="#contact"
                class="px-8 py-4 border border-white/20 hover:border-cyan-400 text-white rounded-2xl font-semibold backdrop-blur-sm hover:bg-white/10 transition duration-300">
                Contactarme
            </a>

        </div>

        <!-- Mensaje Session -->
        @if ($mensaje = Session::get('success'))
            <div
                class="mt-8 bg-green-500/20 border border-green-400 text-green-300 px-6 py-4 rounded-2xl backdrop-blur-md shadow-lg">
                {{ $mensaje }}
            </div>
        @endif

    </div>

</section>
<!-- End Hero -->

<main id="main" class="bg-slate-500 text-white">

    <!-- ===== SOBRE MÍ ===== -->
    <section id="about" class="py-24">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-6 text-white">
                    Sobre mí
                </h2>

                <div class="w-24 h-1 bg-cyan-400 mx-auto rounded-full"></div>

                <p class="mt-8 text-slate-300 max-w-4xl mx-auto leading-8 text-lg">
                    Soy José Miguel, analista programador con experiencia en desarrollo web,
                    aplicaciones móviles y automatización de procesos. He trabajado con tecnologías
                    como PHP, Laravel, Java, SQL, JSON y XML, desarrollando proyectos enfocados
                    en soluciones modernas, escalables y funcionales.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Imagen -->
                <div class="relative">
                    <img src="{{ asset('assets/img/fondo.jpg') }}"
                        class="rounded-3xl shadow-2xl border border-slate-800">

                    <div class="absolute -bottom-6 -right-6 bg-cyan-500 p-6 rounded-2xl shadow-xl">
                        <h3 class="text-3xl font-bold text-red-600">Laravel</h3>
                        <p class="text-sm">Full Stack Developer</p>
                    </div>
                </div>

                <!-- Información -->
                <div>

                    <h3 class="text-4xl font-bold mb-8 text-cyan-400">
                        Analista Programador & Desarrollador Web
                    </h3>

                    <div class="grid sm:grid-cols-2 gap-6 text-slate-300">

                        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800">
                            <span class="font-bold text-white">Nacimiento:</span>
                            <p>05 Septiembre 2000</p>
                        </div>

                        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800">
                            <span class="font-bold text-white">Ciudad:</span>
                            <p>Santiago, Chile</p>
                        </div>

                        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800">
                            <span class="font-bold text-white">Teléfono:</span>
                            <p>+56 9 3562 9178</p>
                        </div>

                        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800">
                            <span class="font-bold text-white">Sitio web:</span>
                            <a href="{{ route('Welcome') }}" class="text-cyan-400 hover:text-cyan-300">
                                www.joseti.com
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ===== ESTADÍSTICAS ===== -->
    <section id="resume" class="py-24 bg-slate-900">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold mb-6 text-white">
                    Estadísticas
                </h2>

                <p class="text-slate-400 text-lg">
                    Clientes, proyectos y tecnologías desarrolladas.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Clientes -->
                <div
                    class="bg-slate-950 border border-slate-800 rounded-3xl p-10 text-center hover:-translate-y-2 transition">

                    <?php $contandorcliente = count($cliente); ?>

                    <div class="text-6xl mb-4">😊</div>

                    <h3 class="text-5xl font-bold text-cyan-400">
                        {{ $contandorcliente }}
                    </h3>

                    <p class="mt-4 text-slate-300">
                        Clientes
                    </p>

                </div>

                <!-- Proyectos -->
                <div
                    class="bg-slate-950 border border-slate-800 rounded-3xl p-10 text-center hover:-translate-y-2 transition">

                    <?php $contandorproyecto = count($proyecto); ?>

                    <div class="text-6xl mb-4">🚀</div>

                    <h3 class="text-5xl font-bold text-cyan-400">
                        {{ $contandorproyecto }}
                    </h3>

                    <p class="mt-4 text-slate-300">
                        Proyectos
                    </p>

                </div>

                <!-- Tecnologías -->
                <div
                    class="bg-slate-950 border border-slate-800 rounded-3xl p-10 text-center hover:-translate-y-2 transition">

                    <?php $contandortecnologia = count($tecnologia); ?>

                    <div class="text-6xl mb-4">💻</div>

                    <h3 class="text-5xl font-bold text-cyan-400">
                        {{ $contandortecnologia }}
                    </h3>

                    <p class="mt-4 text-slate-300">
                        Tecnologías
                    </p>

                </div>

                <!-- Empresas -->
                <div
                    class="bg-slate-950 border border-slate-800 rounded-3xl p-10 text-center hover:-translate-y-2 transition">

                    <?php $contandorempresa = count($empresa); ?>

                    <div class="text-6xl mb-4">🏢</div>

                    <h3 class="text-5xl font-bold text-cyan-400">
                        {{ $contandorempresa }}
                    </h3>

                    <p class="mt-4 text-slate-300">
                        Empresas
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ===== HABILIDADES ===== -->
    <section id="skills" class="py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold mb-6">
                    Habilidades
                </h2>

                <p class="text-slate-400 text-lg">
                    Tecnologías dominadas y experiencia profesional.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">

                @forelse ($tecnologia as $item)

                    <div
                        class="bg-slate-900 border border-slate-800 rounded-3xl p-6 flex items-center justify-center hover:scale-105 transition">

                        <img src="{{ asset($item->imagen) }}" class="w-20 h-20 object-contain">

                    </div>

                @empty

                    <div class="bg-red-500/20 border border-red-500 text-red-300 p-6 rounded-2xl">
                        No hay habilidades registradas
                    </div>

                @endforelse

            </div>

        </div>

    </section>

    <!-- ===== PORTAFOLIO ===== -->
    <section id="portfolio" class="py-24 bg-slate-900">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20">

                <h2 class="text-5xl font-bold mb-6 text-white">
                    Portafolio
                </h2>

                <p class="text-slate-400 text-lg">
                    Proyectos desarrollados y experiencias profesionales.
                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

                @forelse ($proyecto as $item)

                    <div
                        class="bg-slate-950 rounded-3xl overflow-hidden border border-slate-800 hover:-translate-y-2 transition">

                        <img src="{{ asset($item->imagen) }}" class="w-full h-60 object-cover">

                        <div class="p-8">

                            <h3 class="text-2xl font-bold mb-4">
                                {{ $item->nombre }}
                            </h3>

                            <a href="{{ $item->link }}" target="_blank"
                                class="inline-block bg-cyan-500 hover:bg-cyan-400 text-white px-6 py-3 rounded-xl transition">
                                Ver Proyecto
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="bg-red-500/20 border border-red-500 text-red-300 p-6 rounded-2xl">
                        No hay proyectos
                    </div>

                @endforelse

            </div>

        </div>

    </section>
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="bg-slate-950 py-24">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <!-- Título -->
            <div class="text-center mb-16">

                <span class="text-cyan-400 uppercase tracking-[0.3em] text-sm font-semibold">
                    Servicios
                </span>

                <h2 class="mt-4 text-4xl md:text-5xl font-black text-white">
                    Soluciones Tecnológicas
                </h2>

                <p class="mt-6 text-slate-400 max-w-3xl mx-auto text-lg leading-relaxed">
                    Desarrollo soluciones modernas enfocadas en automatización,
                    sistemas web, infraestructura Linux y experiencia digital.
                </p>

            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-cyan-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L15 12l-5.25-5" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        Desarrollo Web
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Desarrollo de sistemas web modernos con Laravel,
                        TailwindCSS, APIs, paneles administrativos y automatización.
                    </p>

                </div>

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-emerald-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15a4 4 0 014-4h9a5 5 0 010 10H7a4 4 0 01-4-4z" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        Servidores Linux
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Configuración de VPS, hosting, Docker, Nginx,
                        seguridad, despliegue Laravel y optimización Linux.
                    </p>

                </div>

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-purple-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 3v11.25M14.25 9l-4.5 5.25M5.25 19.5h13.5" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        APIs & Integraciones
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Creación e integración de APIs REST,
                        autenticación JWT, pagos online y servicios externos.
                    </p>

                </div>

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        Automatización
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Optimización de procesos empresariales mediante software,
                        bots, tareas automáticas y paneles de control.
                    </p>

                </div>

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-pink-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-pink-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3z" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        IA & Software
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Integración de inteligencia artificial, Ollama,
                        automatización con IA y asistentes inteligentes.
                    </p>

                </div>

                <!-- Card -->
                <div
                    class="group bg-slate-900 border border-slate-800 rounded-3xl p-8 hover:border-cyan-500 hover:-translate-y-2 transition duration-300 shadow-xl">

                    <div class="w-16 h-16 rounded-2xl bg-red-500/10 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1zm0 0v4m0-10h.01" />

                        </svg>

                    </div>

                    <h3 class="text-2xl font-bold text-white mb-4">
                        Soporte Técnico
                    </h3>

                    <p class="text-slate-400 leading-relaxed">
                        Soporte remoto, mantenimiento de sistemas,
                        respaldo, monitoreo y solución de problemas.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ===== CONTACTO ===== -->
    <section id="contact" class="py-24">

        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center mb-20">

                <h2 class="text-5xl font-bold mb-6 text-white">
                    Contacto
                </h2>

                <p class="text-slate-400 text-lg">
                    Hablemos sobre tu próximo proyecto.
                </p>

            </div>

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- Información -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-10">

                    <div class="space-y-8">

                        <div>
                            <h3 class="text-cyan-400 text-xl font-bold mb-2">
                                Correo
                            </h3>

                            <p class="text-slate-300">
                                jose.calderon15@inacapmail.cl
                            </p>
                        </div>

                        <div>
                            <h3 class="text-cyan-400 text-xl font-bold mb-2">
                                Teléfono
                            </h3>

                            <p class="text-slate-300">
                                +56 9 3562 9178
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Formulario -->
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-10">

                    @guest

                        <div class="bg-red-500/20 border border-red-500 text-red-300 p-6 rounded-2xl">

                            Debes
                            <a href="{{ route('register') }}" class="text-cyan-400 underline">
                                registrarte
                            </a>

                            o

                            <a href="{{ route('login') }}" class="text-cyan-400 underline">
                                iniciar sesión
                            </a>

                            para enviar un mensaje.

                        </div>

                    @else

                        <form action="{{ route('Contacto.store') }}" method="POST" class="space-y-6">

                            @csrf

                            <div>
                                <label class="block mb-2 text-slate-300">
                                    Asunto
                                </label>

                                <input type="text" name="asunto"
                                    class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-cyan-400"
                                    placeholder="Trabajo para un sitio web">
                            </div>

                            <div>
                                <label class="block mb-2 text-slate-300">
                                    Mensaje
                                </label>

                                <textarea name="mensaje" rows="6"
                                    class="w-full bg-slate-950 border border-slate-700 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-cyan-400"
                                    placeholder="Necesito un sistema para..."></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-cyan-500 hover:bg-cyan-400 text-white py-4 rounded-2xl font-bold transition">
                                Enviar mensaje
                            </button>

                        </form>

                    @endguest

                </div>

            </div>

        </div>

    </section>