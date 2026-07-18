@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-slate-950 flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-2xl">

        <!-- Card -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="p-8 text-center border-b border-slate-800">

                <img
                    src="{{ asset('img/icon/perfil_git.gif') }}"
                    alt="Registro"
                    class="w-28 h-28 rounded-full mx-auto border-4 border-cyan-500 object-cover shadow-lg"
                >

                <h1 class="text-3xl font-bold text-white mt-6">
                    Registro de usuario
                </h1>

                <p class="text-slate-400 mt-2">
                    Crea una cuenta para acceder al sistema
                </p>

            </div>

            <!-- Form -->
            <div class="p-8">

                <form method="POST"
                      action="{{ route('register') }}"
                      class="space-y-6">

                    @csrf

                    <!-- Nombre -->
                    <div>

                        <label
                            for="name"
                            class="block text-slate-300 mb-2 font-medium">

                            Nombre

                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                            placeholder="Ingrese su nombre"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('name') border-red-500 @enderror"
                        >

                        @error('name')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Correo -->
                    <div>

                        <label
                            for="email"
                            class="block text-slate-300 mb-2 font-medium">

                            Correo electrónico

                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder="correo@ejemplo.com"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('email') border-red-500 @enderror"
                        >

                        @error('email')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Teléfono -->
                    <div>

                        <label
                            for="fono"
                            class="block text-slate-300 mb-2 font-medium">

                            Teléfono

                        </label>

                        <input
                            id="fono"
                            type="text"
                            name="fono"
                            value="{{ old('fono') }}"
                            required
                            placeholder="+56 9 1234 5678"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('fono') border-red-500 @enderror"
                        >

                        @error('fono')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Contraseña -->
                    <div>

                        <label
                            for="password"
                            class="block text-slate-300 mb-2 font-medium">

                            Contraseña

                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="********"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('password') border-red-500 @enderror"
                        >

                        @error('password')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Confirmar -->
                    <div>

                        <label
                            for="password-confirm"
                            class="block text-slate-300 mb-2 font-medium">

                            Confirmar contraseña

                        </label>

                        <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="********"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-cyan-500 focus:outline-none transition"
                        >

                    </div>

                    <!-- Botón -->
                    <button
                        type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg shadow-cyan-500/20"
                    >

                        Registrarse

                    </button>

                    <!-- Login -->
                    <div class="text-center pt-2">

                        <a
                            href="{{ route('login') }}"
                            class="text-cyan-400 hover:text-cyan-300 transition"
                        >

                            ¿Ya tienes cuenta? Iniciar sesión

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection