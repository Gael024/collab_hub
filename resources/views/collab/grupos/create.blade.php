<x-auth-layout>
    <div class="max-w-2xl mx-auto py-10 space-y-6">
        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-800 text-center">
            Crear nuevo grupo
        </h1>
        <!-- Formulario -->
        <form method="POST" action="{{ route('grupos.store') }}"
              class="bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf
            <!-- Input nombre -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    Nombre del grupo
                </label>
                <input type="text"
                       name="name"
                       placeholder="Máximo 50 caracteres"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                       required>
            </div>
            <!-- Botón -->
            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                Crear grupo
            </button>
        </form>
    </div>
</x-auth-layout>