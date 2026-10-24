@php
    $links = [
        ['href' => '#hero',      'label' => 'Inicio'],
        ['href' => '#about',     'label' => 'Sobre mí'],
        ['href' => '#resume',    'label' => 'Resumen'],
        ['href' => '#portfolio', 'label' => 'Portafolio'],
        ['href' => '#services',  'label' => 'Servicios'],
        ['href' => '#contact',   'label' => 'Contacto'],
    ];
@endphp

<header id="site-header"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-300 border-b border-transparent">

    <nav class="max-w-screen-2xl mx-auto px-4 lg:px-8">
        <div id="header-bar" class="flex items-center justify-between h-24 transition-all duration-300">

            <!-- Logo -->
            <a href="{{ route('Welcome') }}" class="flex items-center gap-3 group" aria-label="Ir al inicio">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-cyan-400 to-blue-600 rounded-2xl blur opacity-50 group-hover:opacity-90 transition duration-500"></div>
                    <img src="{{ asset('assets/img/img1.jpg') }}"
                         alt="José Calderón"
                         class="relative w-12 h-12 rounded-2xl object-cover ring-2 ring-slate-950 group-hover:scale-105 transition duration-300">
                    <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-emerald-400 ring-2 ring-slate-950" title="Disponible"></span>
                </div>

                <div class="leading-tight">
                    <h1 class="text-white text-xl font-extrabold tracking-tight">José Calderón</h1>
                    <p class="text-[11px] text-cyan-400 font-semibold tracking-[0.2em] uppercase">
                        Laravel • Linux • IA
                    </p>
                </div>
            </a>

            <!-- Menú desktop -->
            <div class="hidden lg:flex items-center gap-8">

                <ul class="flex items-center gap-1 p-1.5 rounded-full bg-slate-900/60 border border-slate-800">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}"
                               data-nav-link
                               class="block px-4 py-2 rounded-full text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}"
                           class="text-sm font-medium text-slate-300 hover:text-white transition">
                            Iniciar sesión
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-5 py-2.5 rounded-full text-sm font-bold text-white bg-gradient-to-r from-cyan-500 to-blue-600 shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40 hover:-translate-y-0.5 transition">
                            Registrarse
                        </a>
                    @else
                        @if (Auth::user()->role_as == 1)
                            <a href="{{ route('home') }}"
                               class="px-4 py-2 rounded-full text-sm font-semibold text-emerald-400 border border-emerald-500/60 bg-emerald-500/10 hover:bg-emerald-500 hover:text-white transition">
                                Panel Admin
                            </a>
                        @endif

                        <!-- Menú de usuario -->
                        <div class="relative" id="user-menu-wrapper">
                            <button id="user-menu-button" type="button"
                                    aria-haspopup="true" aria-expanded="false"
                                    class="flex items-center gap-3 pl-1.5 pr-3 py-1.5 rounded-full bg-slate-900 border border-slate-800 hover:border-cyan-500/60 transition">
                                <span class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 grid place-items-center text-sm font-bold text-white">
                                    {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span class="text-sm font-semibold text-white max-w-[120px] truncate">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div id="user-menu"
                                 class="hidden absolute right-0 mt-3 w-64 rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl shadow-black/50 overflow-hidden">
                                <div class="px-4 py-3 border-b border-slate-800">
                                    <p class="text-white font-semibold truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-slate-400 text-sm truncate">{{ Auth::user()->email }}</p>
                                </div>

                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="flex items-center gap-2 px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Cerrar sesión
                                </a>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>

            <!-- Botón móvil -->
            <button id="menu-button" type="button"
                    aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu"
                    class="lg:hidden grid place-items-center w-11 h-11 rounded-2xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-cyan-400 hover:border-cyan-400 transition">
                <svg id="icon-open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu"
             class="hidden lg:hidden mb-4 p-4 rounded-3xl bg-slate-900/95 backdrop-blur-xl border border-slate-800 shadow-2xl shadow-black/50">

            <div class="flex flex-col gap-1">
                @foreach ($links as $link)
                    <a href="{{ $link['href'] }}"
                       data-nav-link
                       class="px-4 py-3 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800 transition">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="mt-4 pt-4 border-t border-slate-800">
                @guest
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('login') }}"
                           class="text-center py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white transition">
                            Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}"
                           class="text-center py-3 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold transition">
                            Registrarse
                        </a>
                    </div>
                @else
                    <div class="flex items-center gap-3 p-3 mb-3 rounded-2xl bg-slate-950 border border-slate-800">
                        <span class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 grid place-items-center font-bold text-white">
                            {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <div class="min-w-0">
                            <p class="text-white font-semibold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-slate-400 text-sm truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    @if (Auth::user()->role_as == 1)
                        <a href="{{ route('home') }}"
                           class="block text-center mb-3 py-3 rounded-xl border border-emerald-500/60 bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500 hover:text-white transition">
                            Panel Admin
                        </a>
                    @endif

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                       class="block text-center py-3 rounded-xl bg-red-500/90 hover:bg-red-500 text-white transition">
                        Cerrar sesión
                    </a>

                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</header>

<!-- Espaciador para que el contenido no quede bajo el header fijo -->
<div class="h-24"></div>

<script>
    (() => {
        const header     = document.getElementById('site-header');
        const bar        = document.getElementById('header-bar');
        const menuBtn    = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen   = document.getElementById('icon-open');
        const iconClose  = document.getElementById('icon-close');
        const userBtn    = document.getElementById('user-menu-button');
        const userMenu   = document.getElementById('user-menu');

        // Header transparente arriba, "glass" al hacer scroll
        const onScroll = () => {
            const scrolled = window.scrollY > 10;
            header.classList.toggle('bg-slate-950/80', scrolled);
            header.classList.toggle('backdrop-blur-xl', scrolled);
            header.classList.toggle('border-slate-800', scrolled);
            header.classList.toggle('shadow-[0_10px_40px_rgba(0,0,0,0.5)]', scrolled);
            bar.classList.toggle('h-24', !scrolled);
            bar.classList.toggle('h-16', scrolled);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        // Menú móvil
        const setMobile = (open) => {
            mobileMenu.classList.toggle('hidden', !open);
            iconOpen.classList.toggle('hidden', open);
            iconClose.classList.toggle('hidden', !open);
            menuBtn.setAttribute('aria-expanded', open);
        };
        menuBtn.addEventListener('click', () => setMobile(mobileMenu.classList.contains('hidden')));
        mobileMenu.querySelectorAll('a[href^="#"]').forEach(a => a.addEventListener('click', () => setMobile(false)));

        // Menú de usuario (desktop)
        if (userBtn) {
            const setUser = (open) => {
                userMenu.classList.toggle('hidden', !open);
                userBtn.setAttribute('aria-expanded', open);
            };
            userBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                setUser(userMenu.classList.contains('hidden'));
            });
            document.addEventListener('click', () => setUser(false));
            document.addEventListener('keydown', (e) => e.key === 'Escape' && (setUser(false), setMobile(false)));
        }

        // Link activo según la sección visible
        const links    = [...document.querySelectorAll('[data-nav-link]')];
        const sections = links.map(l => document.querySelector(l.getAttribute('href'))).filter(Boolean);
        const active   = ['text-cyan-400', 'bg-slate-800'];

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                links.forEach(l => {
                    const on = l.getAttribute('href') === '#' + entry.target.id;
                    active.forEach(c => l.classList.toggle(c, on));
                });
            });
        }, { rootMargin: '-45% 0px -50% 0px' });

        sections.forEach(s => observer.observe(s));
    })();
</script>