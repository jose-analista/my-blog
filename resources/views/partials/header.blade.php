<header class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/90 border-b border-slate-800 shadow-[0_0_40px_rgba(0,0,0,0.6)]">

    <nav class="max-w-screen-2xl mx-auto px-4 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('Welcome') }}"
               class="flex items-center gap-4 group">

                <div class="relative">

                    <div class="absolute inset-0 bg-cyan-500 blur-xl opacity-40 group-hover:opacity-70 transition duration-500 rounded-full"></div>

                    <img 
                        src="{{ asset('assets/img/img1.jpg') }}"
                        alt="José Calderón"
                        class="relative w-14 h-14 rounded-2xl border-2 border-cyan-400 object-cover shadow-lg shadow-cyan-500/20 group-hover:scale-105 transition duration-300"
                    >

                </div>

                <div>

                    <h1 class="text-white text-2xl font-black tracking-wide">
                        José Calderón
                    </h1>

                    <p class="text-sm text-cyan-400 font-medium tracking-widest uppercase">
                        Laravel • Linux • IA
                    </p>

                </div>

            </a>

            <!-- MENU DESKTOP -->
            <div class="hidden lg:flex items-center gap-10">

                <!-- Navegación -->
                <ul class="flex items-center gap-8">

                    <li>
                        <a href="#hero"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Inicio
                        </a>
                    </li>

                    <li>
                        <a href="#about"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Sobre mí
                        </a>
                    </li>

                    <li>
                        <a href="#resume"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Resumen
                        </a>
                    </li>

                    <li>
                        <a href="#portfolio"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Portafolio
                        </a>
                    </li>

                    <li>
                        <a href="#services"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Servicios
                        </a>
                    </li>

                    <li>
                        <a href="#contact"
                           class="text-slate-300 hover:text-cyan-400 transition duration-300 font-medium relative after:absolute after:left-0 after:-bottom-1 after:w-0 after:h-[2px] after:bg-cyan-400 hover:after:w-full after:transition-all">
                            Contacto
                        </a>
                    </li>

                </ul>

                <!-- Usuario -->
                <div class="flex items-center gap-4">

                    @guest

                        <a href="{{ route('login') }}"
                           class="text-slate-300 hover:text-white transition font-medium">

                            Iniciar sesión

                        </a>

                        <a href="{{ route('register') }}"
                           class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-cyan-500/20 transition duration-300 hover:scale-105">

                            Registrarse

                        </a>

                    @else

                        @if(Auth::user()->role_as == 1)

                            <a href="{{ route('home') }}"
                               class="bg-emerald-500/20 border border-emerald-500 text-emerald-400 hover:bg-emerald-500 hover:text-white px-5 py-2 rounded-2xl transition duration-300">

                                Panel Admin

                            </a>

                        @endif

                        <!-- User -->
                        <div class="bg-slate-900 border border-slate-800 rounded-2xl px-4 py-2">

                            <p class="text-white font-semibold leading-none">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-slate-400 text-sm mt-1">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl font-semibold shadow-lg shadow-red-500/20 transition duration-300 hover:scale-105">

                            Salir

                        </a>

                        <form id="logout-form"
                              action="{{ route('logout') }}"
                              method="POST"
                              class="hidden">
                            @csrf
                        </form>

                    @endguest

                </div>

            </div>

            <!-- Botón Mobile -->
            <button id="menu-button"
                    class="lg:hidden flex items-center justify-center w-12 h-12 rounded-2xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-cyan-400 hover:border-cyan-400 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

        </div>

        <!-- MENU MOBILE -->
        <div id="mobile-menu"
             class="hidden lg:hidden py-6 border-t border-slate-800">

            <div class="flex flex-col gap-4">

                <a href="#hero" class="text-slate-300 hover:text-cyan-400 transition">
                    Inicio
                </a>

                <a href="#about" class="text-slate-300 hover:text-cyan-400 transition">
                    Sobre mí
                </a>

                <a href="#resume" class="text-slate-300 hover:text-cyan-400 transition">
                    Resumen
                </a>

                <a href="#portfolio" class="text-slate-300 hover:text-cyan-400 transition">
                    Portafolio
                </a>

                <a href="#services" class="text-slate-300 hover:text-cyan-400 transition">
                    Servicios
                </a>

                <a href="#contact" class="text-slate-300 hover:text-cyan-400 transition">
                    Contacto
                </a>

                <div class="pt-4 border-t border-slate-800">

                    @guest

                        <div class="flex flex-col gap-3">

                            <a href="{{ route('login') }}"
                               class="w-full text-center bg-slate-800 hover:bg-slate-700 text-white py-3 rounded-2xl transition">

                                Iniciar sesión

                            </a>

                            <a href="{{ route('register') }}"
                               class="w-full text-center bg-cyan-500 hover:bg-cyan-600 text-white py-3 rounded-2xl transition">

                                Registrarse

                            </a>

                        </div>

                    @else

                        <div class="bg-slate-900 rounded-2xl p-4 mb-4 border border-slate-800">

                            <p class="text-white font-semibold">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-slate-400 text-sm">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="block text-center bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl transition">

                            Cerrar sesión

                        </a>

                    @endguest

                </div>

            </div>

        </div>

    </nav>

</header>

<script>

    const button = document.getElementById('menu-button');
    const menu = document.getElementById('mobile-menu');

    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

</script>