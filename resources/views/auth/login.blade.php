@extends('layouts.app')

@section('content')

    <section class="min-h-screen bg-slate-950 flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <!-- Card -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl p-8">
                <a href="{{ route('Welcome') }}" class="text-cyan-400 hover:text-cyan-300 transition">

                    volver

                </a>
                <!-- Header -->
                <div class="text-center">

                    <img src="{{ asset('img/icon/perfil_git.gif') }}" alt="Perfil"
                        class="w-28 h-28 rounded-full mx-auto border-4 border-cyan-500 shadow-lg object-cover">

                    <h1 class="text-3xl font-bold text-white mt-6">
                        Bienvenido
                    </h1>

                    <p class="text-slate-400 mt-2">
                        Inicia sesión para continuar
                    </p>

                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">

                    @csrf

                    <!-- Email -->
                    <div>

                        <label class="block text-slate-300 mb-2 font-medium">
                            Correo electrónico
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus placeholder="correo@ejemplo.com"
                            class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('email') border-red-500 @enderror">

                        @error('email')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Password -->
                    <div>

                        <label class="block text-slate-300 mb-2 font-medium">
                            Contraseña
                        </label>

                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="********"
                            class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500 focus:outline-none transition @error('password') border-red-500 @enderror">

                        @error('password')

                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg shadow-cyan-500/20">

                        Iniciar sesión

                    </button>

                    <!-- Links -->
                    <div class="text-center pt-4">

                        <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 transition">

                            ¿No tienes cuenta? Registrarse

                        </a>

                    </div>

                    @if (Route::has('password.request'))

                        <div class="text-center">

                            <a href="{{ route('password.request') }}"
                                class="text-slate-400 hover:text-white text-sm transition">

                                ¿Olvidaste tu contraseña?

                            </a>

                        </div>

                    @endif

                </form>

            </div>

        </div>

    </section>

@endsection