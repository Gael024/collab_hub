<x-auth-layout>

    <div class="max-w-4xl mx-auto py-0 flex flex-col items-center space-y-6">

        <!-- Imagen -->
        <img src="{{ asset('images/img3.png') }}" 
            alt="Grupos"
            class="w-40 h-40 object-contain">

        <!-- Mensaje -->
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold text-gray-800">
                Bienvenido de nuevo, {{ Auth::user()->name }}
            </h1>

            <p class="text-gray-500">
                Accede a tus grupos colaborativos y continúa trabajando.
            </p>
        </div>

        <!-- Botón -->
        <a href="{{ route('grupos.index') }}"
           class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition">
            Visitar grupos
        </a>

    </div>

</x-auth-layout>