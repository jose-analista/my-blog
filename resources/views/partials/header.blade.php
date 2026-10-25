@php
    $user = Auth::user();

    $avatar = $user
        ? asset($user->imagen ?: 'img/usuario/negro.jpg')
        : null;

    $links = [
        ['href' => '#hero',      'label' => 'Inicio',     'dot' => 'bg-cyan-400',    'hover' => 'hover:text-cyan-300',    'active' => 'text-cyan-300 bg-cyan-500/15'],
        ['href' => '#about',     'label' => 'Sobre mí',   'dot' => 'bg-violet-400',  'hover' => 'hover:text-violet-300',  'active' => 'text-violet-300 bg-violet-500/15'],
        ['href' => '#resume',    'label' => 'Resumen',    'dot' => 'bg-emerald-400', 'hover' => 'hover:text-emerald-300', 'active' => 'text-emerald-300 bg-emerald-500/15'],
        ['href' => '#portfolio', 'label' => 'Portafolio', 'dot' => 'bg-amber-400',   'hover' => 'hover:text-amber-300',   'active' => 'text-amber-300 bg-amber-500/15'],
        ['href' => '#services',  'label' => 'Servicios',  'dot' => 'bg-pink-400',   'hover' => 'hover:text-pink-300',    'active' => 'text-pink-300 bg-pink-500/15'],
        ['href' => '#contact',   'label' => 'Contacto',   'dot' => 'bg-sky-400',    'hover' => 'hover:text-sky-300',     'active' => 'text-sky-300 bg-sky-500/15'],
    ];
@endphp

<header id="site-header"
    class="fixed inset-x-0 top-0 z-50 border-b border-transparent bg-slate-950/90 backdrop-blur-xl transition-all duration-300">

    <div class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-cyan-400 via-violet-500 to-pink-500"
         aria-hidden="true"></div>

    <nav class="mx-auto max-w-screen-2xl px-4 lg:px-8"
         aria-label="Navegación principal">

        <div id="header-bar" class="flex h-20 items-center justify-between transition-all duration-300">

            {{-- Marca --}}
            <a href="#hero" class="flex shrink-0 items-center gap-2" aria-label="Ir al inicio">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-cyan-400 via-violet-500 to-pink-500 font-black text-white shadow-lg shadow-violet-500/20">
                    J
                </span>
                <!-- <span class="text-lg font-bold tracking-tight text-white">
                    <span class="text-cyan-400">Cay</span>tech
                </span> -->
            </a>

            {{-- Navegación de escritorio --}}
            <div class="hidden items-center gap-5 lg:flex">

                <ul class="flex items-center gap-1 rounded-full border border-slate-800 bg-slate-900/70 p-1.5 shadow-lg shadow-violet-500/5">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}"
                               data-nav-link
                               data-active="{{ $link['active'] }}"
                               class="flex items-center gap-2 rounded-full px-3 py-2 text-sm font-medium text-slate-300 transition {{ $link['hover'] }} hover:bg-slate-800">
                                <span class="h-1.5 w-1.5 rounded-full {{ $link['dot'] }}"
                                      aria-hidden="true"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}"
                           class="rounded-full border border-cyan-500/40 px-4 py-2 text-sm font-semibold text-cyan-300 transition hover:border-cyan-400 hover:bg-cyan-500/10">
                            Iniciar sesión
                        </a>

                        <a href="{{ route('register') }}"
                           class="rounded-full bg-gradient-to-r from-cyan-500 via-violet-500 to-pink-500 px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-violet-500/20 transition hover:-translate-y-0.5 hover:shadow-pink-500/30">
                            Registrarse
                        </a>
                    @else
                        @if ((int) $user->role_as === 1)
                            <a href="{{ route('home') }}"
                               class="rounded-full border border-emerald-500/40 bg-emerald-500/10 px-4 py-2 text-sm font-semibold text-emerald-300 transition hover:bg-emerald-500 hover:text-white">
                                Panel Admin
                            </a>
                        @endif

                        {{-- Menú de usuario --}}
                        <div class="relative" id="user-menu-wrapper">
                            <button id="user-menu-button"
                                    type="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    aria-controls="user-menu"
                                    class="flex items-center gap-2 rounded-full border border-slate-800 bg-slate-900 py-1.5 pl-1.5 pr-3 transition hover:border-violet-500/60">

                                <img src="{{ $avatar }}"
                                     alt="Foto de {{ $user->name }}"
                                     class="h-9 w-9 rounded-full object-cover ring-2 ring-violet-500/50">

                                <span class="max-w-[120px] truncate text-sm font-semibold text-white">
                                    {{ $user->name }}
                                </span>

                                <svg id="user-chevron" class="h-4 w-4 text-violet-300 transition-transform"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                     aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m6 9 6 6 6-6"/>
                                </svg>
                            </button>

                            <div id="user-menu"
                                 class="absolute right-0 mt-3 hidden w-64 overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-2xl shadow-black/40">

                                <div class="h-0.5 bg-gradient-to-r from-cyan-400 via-violet-500 to-pink-500"></div>

                                <div class="flex items-center gap-3 border-b border-slate-800 px-4 py-4">
                                    <img src="{{ $avatar }}"
                                         alt=""
                                         class="h-11 w-11 rounded-full object-cover ring-2 ring-violet-500/50">

                                    <div class="min-w-0">
                                        <p class="truncate font-semibold text-white">{{ $user->name }}</p>
                                        <p class="truncate text-sm text-slate-400">{{ $user->email }}</p>
                                    </div>
                                </div>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm text-red-400 transition hover:bg-red-500/10">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M17 16l4-4m0 0-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1"/>
                                        </svg>
                                        Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>

            {{-- Botón móvil --}}
            <button id="menu-button"
                    type="button"
                    aria-label="Abrir menú"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    class="grid h-11 w-11 place-items-center rounded-xl border border-slate-800 bg-slate-900 text-cyan-300 transition hover:border-cyan-400 lg:hidden">

                <svg id="icon-open" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                <svg id="icon-close" class="hidden h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Menú móvil --}}
        <div id="mobile-menu"
             class="mb-4 hidden rounded-2xl border border-slate-800 bg-slate-900/95 p-4 shadow-2xl shadow-black/40 backdrop-blur-xl lg:hidden">

            <div class="flex flex-col gap-1">
                @foreach ($links as $link)
                    <a href="{{ $link['href'] }}"
                       data-nav-link
                       data-active="{{ $link['active'] }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-300 transition {{ $link['hover'] }} hover:bg-slate-800">
                        <span class="h-2 w-2 rounded-full {{ $link['dot'] }}"
                              aria-hidden="true"></span>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="mt-4 border-t border-slate-800 pt-4">
                @guest
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('login') }}"
                           class="rounded-xl border border-cyan-500/40 py-3 text-center text-sm font-semibold text-cyan-300 transition hover:bg-cyan-500/10">
                            Iniciar sesión
                        </a>

                        <a href="{{ route('register') }}"
                           class="rounded-xl bg-gradient-to-r from-cyan-500 via-violet-500 to-pink-500 py-3 text-center text-sm font-bold text-white">
                            Registrarse
                        </a>
                    </div>
                @else
                    <div class="mb-3 flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-950 p-3">
                        <img src="{{ $avatar }}"
                             alt="Foto de {{ $user->name }}"
                             class="h-10 w-10 rounded-full object-cover ring-2 ring-violet-500/50">

                        <div class="min-w-0">
                            <p class="truncate font-semibold text-white">{{ $user->name }}</p>
                            <p class="truncate text-sm text-slate-400">{{ $user->email }}</p>
                        </div>
                    </div>

                    @if ((int) $user->role_as === 1)
                        <a href="{{ route('home') }}"
                           class="mb-3 block rounded-xl border border-emerald-500/40 bg-emerald-500/10 py-3 text-center text-sm font-semibold text-emerald-300 transition hover:bg-emerald-500 hover:text-white">
                            Panel Admin
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full rounded-xl bg-red-500/10 py-3 text-sm font-semibold text-red-400 transition hover:bg-red-500 hover:text-white">
                            Cerrar sesión
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</header>

{{-- Espacio para el header fijo --}}
<div class="h-20" aria-hidden="true"></div>

<script>
(() => {
    const header = document.getElementById('site-header');
    const bar = document.getElementById('header-bar');
    const menuBtn = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    const userWrapper = document.getElementById('user-menu-wrapper');
    const userBtn = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
    const userChevron = document.getElementById('user-chevron');

    if (!header || !bar) return;

    // Efecto al desplazarse.
    const onScroll = () => {
        const scrolled = window.scrollY > 10;

        header.classList.toggle('border-slate-800', scrolled);
        header.classList.toggle('shadow-lg', scrolled);
        bar.classList.toggle('h-20', !scrolled);
        bar.classList.toggle('h-16', scrolled);
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    // Menú móvil.
    const setMobile = (open) => {
        if (!menuBtn || !mobileMenu) return;

        mobileMenu.classList.toggle('hidden', !open);
        iconOpen?.classList.toggle('hidden', open);
        iconClose?.classList.toggle('hidden', !open);

        menuBtn.setAttribute('aria-expanded', String(open));
        menuBtn.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    };

    menuBtn?.addEventListener('click', () => {
        setMobile(mobileMenu.classList.contains('hidden'));
    });

    mobileMenu?.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', () => setMobile(false));
    });

    // Menú del usuario.
    const setUser = (open) => {
        if (!userBtn || !userMenu) return;

        userMenu.classList.toggle('hidden', !open);
        userBtn.setAttribute('aria-expanded', String(open));
        userChevron?.classList.toggle('rotate-180', open);
    };

    userBtn?.addEventListener('click', event => {
        event.stopPropagation();
        setUser(userMenu.classList.contains('hidden'));
    });

    userMenu?.addEventListener('click', event => event.stopPropagation());

    document.addEventListener('click', event => {
        if (userWrapper && !userWrapper.contains(event.target)) {
            setUser(false);
        }
    });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            setUser(false);
            setMobile(false);
        }
    });

    // Navegación activa: sincroniza escritorio y móvil.
    const navLinks = [...document.querySelectorAll('[data-nav-link]')];
    const sectionIds = [...new Set(
        navLinks.map(link => link.getAttribute('href'))
            .filter(href => href && href.startsWith('#'))
            .map(href => href.slice(1))
    )];

    const sections = sectionIds
        .map(id => document.getElementById(id))
        .filter(Boolean);

    const activateLink = (id) => {
        navLinks.forEach(link => {
            const active = link.getAttribute('href') === `#${id}`;
            const activeClasses = (link.dataset.active || '')
                .split(/\s+/)
                .filter(Boolean);

            activeClasses.forEach(className => {
                link.classList.toggle(className, active);
            });

            link.classList.toggle('text-slate-300', !active);

            if (active) {
                link.setAttribute('aria-current', 'location');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    };

    if ('IntersectionObserver' in window && sections.length) {
        const observer = new IntersectionObserver(entries => {
            const visible = entries
                .filter(entry => entry.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

            if (visible.length) {
                activateLink(visible[0].target.id);
            }
        }, {
            rootMargin: '-30% 0px -55% 0px',
            threshold: [0, 0.1, 0.25, 0.5]
        });

        sections.forEach(section => observer.observe(section));
    }

    // Cierra el menú móvil si se cambia a escritorio.
    window.matchMedia('(min-width: 1024px)').addEventListener('change', event => {
        if (event.matches) setMobile(false);
    });
})();
</script>
