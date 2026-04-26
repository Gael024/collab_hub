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
            <!-- Navegación -->
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" 
                    class="px-4 py-2 rounded-md transition duration-200 hover:bg-indigo-700 hover:text-white hover:font-semibold">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}" 
                    class="bg-white text-indigo-600 px-4 py-2 rounded-md transition duration-200 hover:bg-indigo-700 hover:text-white hover:font-semibold">
                        Registrarse
                    </a>
                @endguest

                @auth
                    <span>{{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth
            </div>
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