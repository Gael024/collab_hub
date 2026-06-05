<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CollaHub</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col bg-gray-100">
        <header class="flex justify-between items-center px-6 py-3 bg-indigo-600 text-white shadow-sm">
            <!-- Logo -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" class="h-14 w-auto object-contain">
            </a>
            <!-- Usuario logueado -->
            @auth
                <div class="flex items-center gap-6">
                    @if(Auth::user()->rol !== 'administrador')
                        <a href="{{ route('grupos.index') }}"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition font-bold">
                            Visitar grupos
                        </a>
                    @endif
                    @php
                        $initials =
                            strtoupper(substr(Auth::user()->name, 0, 1)) .
                            strtoupper(substr(Auth::user()->apellido, 0, 1));
                    @endphp
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-white text-indigo-600 flex items-center justify-center font-bold">
                                    {{ $initials }}
                                </div>
                                <span class="font-semibold text-white">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="fill-current h-4 w-4 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')"><strong>Perfil</strong></x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <strong>Cerrar sesión</strong>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth
            <!-- Usuario invitado -->
            @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition">
                        <strong>Iniciar sesión</strong>
                    </a>
                    <a href="{{ route('register') }}"
                    class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition">
                        <strong>Registrarse</strong>
                    </a>
                </div>
            @endguest
        </header>
        <main class="flex-1 flex justify-center items-center p-6">
            {{ $slot }}
        </main>
        <footer class="text-center py-6 bg-indigo-900 text-white font-bold">
        © Todos los derechos reservados - Equipo 3  
        Facultad de Ciencias de la Computación  
        Primavera 2026
        </footer>
    </body>
</html>