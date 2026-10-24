@php
    // Foto del usuario: la suya si tiene, o la imagen por defecto.
    $avatar = Auth::check()
        ? asset(Auth::user()->imagen ?: 'img/usuario/negro.jpg')
        : null;

    // Cada sección tiene su propio color. Las clases van completas para que Tailwind las detecte.
    $links = [
        ['href' => '#hero',      'label' => 'Inicio',     'dot' => 'bg-cyan-400',    'hover' => 'hover:text-cyan-300',    'active' => 'text-cyan-300 bg-cyan-500/15'],
        ['href' => '#about',     'label' => 'Sobre mí',   'dot' => 'bg-violet-400',  'hover' => 'hover:text-violet-300',  'active' => 'text-violet-300 bg-violet-500/15'],
        ['href' => '#resume',    'label' => 'Resumen',    'dot' => 'bg-emerald-400', 'hover' => 'hover:text-emerald-300', 'active' => 'text-emerald-300 bg-emerald-500/15'],
        ['href' => '#portfolio', 'label' => 'Portafolio', 'dot' => 'bg-amber-400',   'hover' => 'hover:text-amber-300',   'active' => 'text-amber-300 bg-amber-500/15'],
        ['href' => '#services',  'label' => 'Servicios',  'dot' => 'bg-pink-400',    'hover' => 'hover:text-pink-300',    'active' => 'text-pink-300 bg-pink-500/15'],
        ['href' => '#contact',   'label' => 'Contacto',   'dot' => 'bg-sky-400',     'hover' => 'hover:text-sky-300',     'active' => 'text-sky-300 bg-sky-500/15'],
    ];
@endphp

<header id="site-header"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-300 border-b border-transparent bg-slate-950/90 backdrop-blur-xl">

    <!-- Línea de color superior -->
    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-cyan-400 via-violet-500 to-pink-500" aria-hidden="true"></div>

    <nav class="max-w-screen-2xl mx-auto px-4 lg:px-8" aria-label="Navegación principal">
        <div id="header-bar" class="flex items-center justify-between h-24 transition-all duration-300">

            <!-- Logo -->
            <a href="{{ route('Welcome') }}" class="flex items-center gap-3 group" aria-label="Ir al inicio">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-cyan-400 via-violet-500 to-pink-500 rounded-2xl blur opacity-60 group-hover:opacity-100 transition duration-500"></div>
                    <img src="{{ asset('assets/img/img3.jpg') }}"
                         alt="José Calderón"
                         class="relative w-12 h-12 rounded-2xl object-cover ring-2 ring-slate-950 group-hover:scale-105 transition duration-300">
                    <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-emerald-400 ring-2 ring-slate-950" title="Disponible"></span>
                </div>

                <!-- <div class="leading-tight">
                    <h1 class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-cyan-300 via-violet-400 to-pink-400 bg-clip-text text-transparent">
                        José Calderón
                    </h1>
                    <p class="text-[11px] font-semibold tracking-[0.2em] uppercase">
                        <span class="text-orange-400">Laravel</span>
                        <span class="text-slate-600">•</span>
                        <span class="text-emerald-400">Linux</span>
                        <span class="text-slate-600">•</span>
                        <span class="text-violet-400">IA</span>
                    </p>
                </div> -->
            </a>

            <!-- Menú desktop -->
            <div class="hidden lg:flex items-center gap-8">

                <ul class="flex items-center gap-1 p-1.5 rounded-full bg-slate-900/60 border border-slate-800 shadow-lg shadow-violet-500/5">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}"
                               data-nav-link
                               data-active="{{ $link['active'] }}"
                               class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium text-slate-300 {{ $link['hover'] }} hover:bg-slate-800 transition">
                                <span class="w-1.5 h-1.5 rounded-full {{ $link['dot'] }}" aria-hidden="true"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 rounded-full text-sm font-semibold text-cyan-300 border border-cyan-500/40 hover:bg-cyan-500/10 hover:border-cyan-400 transition">
                            Iniciar sesión
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-5 py-2.5 rounded-full text-sm font-bold text-white bg-gradient-to-r from-cyan-500 via-violet-500 to-pink-500 shadow-lg shadow-violet-500/30 hover:shadow-pink-500/40 hover:-translate-y-0.5 transition">
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
                                    class="flex items-center gap-3 pl-1.5 pr-3 py-1.5 rounded-full bg-slate-900 border border-slate-800 hover:border-violet-500/60 transition">
                                <img src="{{ $avatar }}" alt="Foto de {{ Auth::user()->name }}"
                                     class="w-8 h-8 rounded-full object-cover ring-2 ring-violet-500/60">
                                <span class="text-sm font-semibold text-white max-w-[120px] truncate">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="w-4 h-4 text-violet-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div id="user-menu"
                                 class="hidden absolute right-0 mt-3 w-64 rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl shadow-black/50 overflow-hidden">
                                <div class="h-0.5 bg-gradient-to-r from-cyan-400 via-violet-500 to-pink-500" aria-hidden="true"></div>
                                <div class="flex items-center gap-3 px-4 py-3 border-b border-slate-800">
                                    <img src="{{ $avatar }}" alt="Foto de {{ Auth::user()->name }}"
                                         class="w-11 h-11 rounded-full object-cover ring-2 ring-violet-500/60">
                                    <div class="min-w-0">
                                        <p class="text-white font-semibold truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-slate-400 text-sm truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="flex items-center gap-2 px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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
                    class="lg:hidden grid place-items-center w-11 h-11 rounded-2xl bg-slate-900 border border-violet-500/40 text-violet-300 hover:text-cyan-300 hover:border-cyan-400 transition">
                <svg id="icon-open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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
                       data-active="{{ $link['active'] }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 {{ $link['hover'] }} hover:bg-slate-800 transition">
                        <span class="w-2 h-2 rounded-full {{ $link['dot'] }}" aria-hidden="true"></span>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="mt-4 pt-4 border-t border-slate-800">
                @guest
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('login') }}"
                           class="text-center py-3 rounded-xl border border-cyan-500/40 text-cyan-300 hover:bg-cyan-500/10 transition">
                            Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}"
                           class="text-center py-3 rounded-xl bg-gradient-to-r from-cyan-500 via-violet-500 to-pink-500 text-white font-semibold transition">
                            Registrarse
                        </a>
                    </div>
                @else
                    <div class="flex items-center gap-3 p-3 mb-3 rounded-2xl bg-slate-950 border border-slate-800">
                        <img src="{{ $avatar }}" alt="Foto de {{ Auth::user()->name }}"
                             class="w-10 h-10 rounded-full object-cover ring-2 ring-violet-500/60">
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
<div class="h-24 bg-slate-950"></div>

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
        const setUser = (open) => {
            if (!userBtn) return;
            userMenu.classList.toggle('hidden', !open);
            userBtn.setAttribute('aria-expanded', open);
        };
        if (userBtn) {
            userBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                setUser(userMenu.classList.contains('hidden'));
            });
            document.addEventListener('click', () => setUser(false));
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') { setUser(false); setMobile(false); }
        });

        // Link activo según la sección visible (cada link usa su propio color)
        const links    = [...document.querySelectorAll('[data-nav-link]')];
        const sections = links.map(l => document.querySelector(l.getAttribute('href'))).filter(Boolean);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                links.forEach(l => {
                    const on = l.getAttribute('href') === '#' + entry.target.id;
                    l.dataset.active.split(' ').forEach(c => l.classList.toggle(c, on));
                    l.classList.toggle('text-slate-300', !on);
                    if (on) l.setAttribute('aria-current', 'true');
                    else l.removeAttribute('aria-current');
                });
            });
        }, { rootMargin: '-45% 0px -50% 0px' });

        sections.forEach(s => observer.observe(s));
    })();
</script>