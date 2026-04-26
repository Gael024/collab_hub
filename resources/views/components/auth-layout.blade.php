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
                    <a href="{{ route('grupos.index') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition font-bold">
                        Visitar grupos
                    </a>
                    @php
                        $initials =
                            strtoupper(substr(Auth::user()->name, 0, 1)) .
                            strtoupper(substr(Auth::user()->apellido, 0, 1));
                    @endphp
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white text-indigo-600 flex items-center justify-center font-bold">
                            {{ $initials }}
                        </div>
                        <span class="font-semibold">
                            {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
            <!-- Usuario invitado -->
            @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}"
                    class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition">
                        Registrarse
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