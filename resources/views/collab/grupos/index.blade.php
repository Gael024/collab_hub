<x-auth-layout>
    <div class="max-w-6xl mx-auto py-10 space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">
                Grupos
            </h1>
            <a href="{{ route('grupos.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                Crear grupo
            </a>
        </div>
        <!-- Buscador (placeholder) -->
        <div>
            <input type="text"
                   placeholder="Buscar grupo..."
                   class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <!-- Tabla -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Fecha de creación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($grupos as $grupo)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                {{ $grupo->id }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('grupos.show', $grupo->id) }}"
                                   class="text-indigo-600 hover:underline font-medium">
                                    {{ $grupo->name }}
                                </a>
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $grupo->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth-layout>