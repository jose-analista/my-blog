{{-- resources/views/admin/webdisenos/index.blade.php --}}
@extends('layouts.inc.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Diseños web</h4>
                </div>

                <div class="card-body">

                    <div x-data="{ modalAbierto: false }">

                        {{-- Botón que abre el modal --}}
                        <button @click="modalAbierto = true" type="button"
                            class="mb-6 inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                            + Nuevo diseño
                        </button>

                        @if(session('success'))
                            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- ================= LISTA + BUSCADOR ================= --}}
                        <div x-data="buscadorDisenos()" x-init="init()"
                            @keydown.window="atajos($event)" class="space-y-4">

                            {{-- BUSCADOR --}}
                            <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">

                                <div class="relative w-full max-w-xl">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z" />
                                        </svg>
                                    </div>

                                    <input x-ref="input" type="search" x-model.debounce.200ms="busqueda"
                                        @keydown.escape="limpiar()" autocomplete="off"
                                        placeholder="Buscar por nombre, descripción o ID…  ( / )"
                                        class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-xl text-sm
                                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">

                                    <button x-show="busqueda" x-cloak @click="limpiar()" type="button"
                                        aria-label="Limpiar búsqueda"
                                        class="absolute inset-y-0 right-0 px-3 text-gray-400 hover:text-gray-700">
                                        ✕
                                    </button>
                                </div>

                                {{-- Contador --}}
                                <p class="text-sm text-gray-500" x-cloak>
                                    <template x-if="busqueda.trim() === ''">
                                        <span><strong x-text="total"></strong> diseño(s)</span>
                                    </template>
                                    <template x-if="busqueda.trim() !== ''">
                                        <span>
                                            <strong x-text="visibles"></strong> de <span x-text="total"></span>
                                            resultado(s)
                                        </span>
                                    </template>
                                </p>
                            </div>

                            {{-- RESULTADOS --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                                @foreach($disenos as $diseno)
                                    <div data-search="{{ \Illuminate\Support\Str::of('#' . $diseno->id . ' ' . $diseno->nombre . ' ' . ($diseno->descripcion ?? ''))->ascii()->lower() }}"
                                        x-show="coincide($el.dataset.search)" x-transition
                                        class="p-4 rounded-xl border border-gray-200 hover:border-indigo-400 hover:shadow-md transition bg-white">

                                        <a href="{{ route('Diseno.show', $diseno) }}" class="block">

                                            {{-- ID --}}
                                            <h4 class="text-xs text-gray-400 mb-1">#{{ $diseno->id }}</h4>

                                            {{-- Nombre --}}
                                            <h5 class="font-semibold text-gray-800 text-base">
                                                {{ $diseno->nombre }}
                                            </h5>

                                            {{-- Descripción --}}
                                            @if($diseno->descripcion)
                                                <p class="mt-2 text-sm text-gray-500 leading-5 line-clamp-3">
                                                    {{ $diseno->descripcion }}
                                                </p>
                                            @else
                                                <p class="mt-2 text-sm text-gray-400 italic">Sin descripción</p>
                                            @endif

                                            {{-- Fecha --}}
                                            <span class="inline-block mt-3 text-xs text-gray-400">
                                                {{ $diseno->created_at->diffForHumans() }}
                                            </span>
                                        </a>

                                        {{-- BOTONES --}}
                                        <div class="flex gap-2 mt-4">

                                            <a href="{{ route('disenos.preview', $diseno) }}"
                                                class="px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition">
                                                Ver
                                            </a>

                                            <a href="{{ route('Diseno.edit', $diseno) }}"
                                                class="px-3 py-2 bg-success text-white rounded-lg text-sm">
                                                Actualizar
                                            </a>

                                            <a href="{{ route('Diseno.show', $diseno->id) }}"
                                                class="px-3 py-2 bg-danger hover:bg-red-200 text-white rounded-lg text-sm">
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Sin diseños creados --}}
                            @if($disenos->isEmpty())
                                <p class="text-gray-400 text-sm">Aún no hay diseños creados.</p>
                            @else
                                {{-- Sin resultados de búsqueda --}}
                                <div x-show="visibles === 0" x-cloak
                                    class="text-center py-10 border border-dashed border-gray-300 rounded-xl">
                                    <p class="text-gray-500 text-sm">
                                        No se encontraron diseños para
                                        “<span class="font-medium" x-text="busqueda"></span>”.
                                    </p>
                                    <button type="button" @click="limpiar()"
                                        class="mt-3 text-sm text-indigo-600 hover:underline">
                                        Limpiar búsqueda
                                    </button>
                                </div>
                            @endif
                        </div>

                        {{-- ================= MODAL ================= --}}
                        <div x-show="modalAbierto" x-cloak
                            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
                            @keydown.escape.window="modalAbierto = false">

                            <div @click.outside="modalAbierto = false"
                                class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Crear nuevo diseño</h3>

                                <form method="POST" action="{{ route('Diseno.store') }}">
                                    @csrf
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del diseño</label>
                                    <input type="text" name="nombre" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none mb-4"
                                        placeholder="Ej: Landing page restaurante">

                                    <label class="block text-sm font-medium text-gray-700 mb-1">Código HTML/Tailwind</label>
                                    <textarea name="codigo" rows="8"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono focus:ring-2 focus:ring-indigo-500 focus:outline-none mb-4"
                                        placeholder="<div class='...'>...</div>"></textarea>

                                    <div class="flex justify-end gap-2">
                                        <button type="button" @click="modalAbierto = false"
                                            class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100">
                                            Cancelar
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 rounded-lg text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function buscadorDisenos() {
            const normalizar = (t) => (t || '')
                .toString()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();

            return {
                busqueda: '',
                textos: [],

                init() {
                    this.textos = [...this.$root.querySelectorAll('[data-search]')]
                        .map(el => el.dataset.search);
                },

                get terminos() {
                    return normalizar(this.busqueda).split(/\s+/).filter(Boolean);
                },

                get total() {
                    return this.textos.length;
                },

                get visibles() {
                    return this.textos.filter(t => this.coincide(t)).length;
                },

                // Todas las palabras escritas deben aparecer en el texto de la tarjeta
                coincide(texto) {
                    return this.terminos.every(t => texto.includes(t));
                },

                limpiar() {
                    this.busqueda = '';
                    this.$refs.input.focus();
                },

                atajos(e) {
                    const enCampo = ['INPUT', 'TEXTAREA', 'SELECT'].includes(e.target.tagName);
                    if (e.key === '/' && !enCampo) {
                        e.preventDefault();
                        this.$refs.input.focus();
                    }
                }
            };
        }
    </script>
@endsection