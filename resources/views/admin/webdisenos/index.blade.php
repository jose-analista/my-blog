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
                        <button @click="modalAbierto = true"
                            class="mb-6 inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                            + Nuevo diseño
                        </button>

                        @if(session('success'))
                            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Lista de nombres --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @forelse($disenos as $diseno)

                                <div class="p-4 rounded-xl border border-gray-200
                                           hover:border-indigo-400 hover:shadow-md
                                           transition bg-white">

                                    {{-- Nombre --}}

                                    <a href="{{ route('Diseno.show', $diseno) }}">

                                        <h5 class="font-semibold text-gray-800">
                                            {{ $diseno->nombre }}
                                        </h5>

                                        <span class="text-xs text-gray-400">
                                            {{ $diseno->created_at->diffForHumans() }}
                                        </span>

                                    </a>


                                    {{-- Botones --}}

                                    <div class="flex gap-2 mt-4">

                                        {{-- VER --}}

                                        <a href="{{ route('disenos.preview', $diseno) }}" class="px-3 py-2 bg-indigo-600
                                                   hover:bg-indigo-700 text-white
                                                   rounded-lg text-sm">
                                            Ver
                                        </a>


                                        {{-- ACTUALIZAR --}}

                                        <a href="{{ route('Diseno.edit', $diseno) }}" class="px-3 py-2 bg-success text-white
                                                   rounded-lg text-sm">
                                            Actualizar
                                        </a>
                                       <a href="{{ route('Diseno.show', $diseno->id) }}"
                                            class="px-3 py-2 bg-danger hover:bg-red-200 text-white rounded-lg text-sm">
                                            Eliminar
                                        </a>
                                    </div>

                                </div> 

                            @empty

                                <p class="text-gray-400 text-sm">
                                    Aún no hay diseños creados.
                                </p>

                            @endforelse
                        </div>

                        {{-- Modal --}}
                        <div x-show="modalAbierto" x-cloak
                            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
                            @keydown.escape.window="modalAbierto = false">

                            <div @click.outside="modalAbierto = false"
                                class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Crear nuevo diseño</h3>

                                <form method="POST" action="{{ route('Diseno.store') }}">
                                    @csrf
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del diseño</label>
                                    <input type="text" name="nombre" required autofocus
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
@endsection