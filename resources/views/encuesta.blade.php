{{-- resources/views/encuesta.blade.php --}}

<x-auth-layout>
    <div class="bg-white p-10 rounded-xl shadow-lg">
        <div class="mb-8">
            <h2 class="text-center text-3xl font-extrabold text-gray-900">¡Bienvenido a CollabHub!</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Por favor, completa esta breve encuesta para personalizar tu experiencia
            </p>
        </div>
        <form method="POST" action="{{ route('encuesta.store') }}" id="encuestaForm">
            @csrf
            <!-- Sector -->
            <div class="mb-4">
                <label for="sector" class="block text-sm font-medium text-gray-700">¿En qué sector trabajas?</label>
                <select id="sector" name="sector" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona un sector</option>
                    <option value="educacion">Educación</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="negocios">Negocios</option>
                    <option value="salud">Salud</option>
                </select>
                @error('sector')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Rol -->
            <div class="mb-4">
                <label for="tipo" class="block text-sm font-medium text-gray-700">¿Cuál es tu rol?</label>
                <select id="tipo" name="tipo" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona tu rol</option>
                    <option value="estudiante">Estudiante</option>
                    <option value="profesor">Profesor</option>
                    <option value="profesional">Profesional</option>
                </select>
                @error('rol')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Referencia -->
            <div class="mb-4">
                <label for="referencia" class="block text-sm font-medium text-gray-700">¿Cómo conociste CollabHub?</label>
                <select id="referencia" name="referencia" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona una opción</option>
                    <option value="redes">Redes sociales</option>
                    <option value="amigos">Amigos/compañeros</option>
                    <option value="anuncio">Anuncio publicitario</option>
                    <option value="empresa">Mi empresa lo usa</option>
                </select>
                @error('referencia')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Característica principal -->
            <div class="mb-4">
                <label for="carac_principal" class="block text-sm font-medium text-gray-700">¿Qué característica te interesa más?</label>
                <select id="carac_principal" name="carac_principal" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona una característica</option>
                    <option value="presencia">Gestor de presencia</option>
                    <option value="chat">Chat en tiempo real</option>
                    <option value="editor">Editor compartido</option>
                </select>
                @error('carac_principal')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Grado académico -->
            <div class="mb-4">
                <label for="grado_academico" class="block text-sm font-medium text-gray-700">Grado académico más alto</label>
                <select id="grado_academico" name="grado_academico" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona tu nivel</option>
                    <option value="preparatoria">Preparatoria</option>
                    <option value="licenciatura">Licenciatura</option>
                    <option value="maestria">Maestría</option>
                    <option value="doctorado">Doctorado</option>
                </select>
                @error('grado_academico')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Procedencia -->
            <div class="mb-4">
                <label for="procedencia" class="block text-sm font-medium text-gray-700">Institución o empresa de procedencia</label>
                <input type="text" id="procedencia" name="procedencia" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    value="{{ old('procedencia') }}">
                @error('procedencia')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-end mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Completar registro
                </button>
            </div>
        </form>
        <script>
            document.getElementById('encuestaForm').addEventListener('submit', function(e) {
                console.log('Formulario de encuesta enviado');
                const formData = new FormData(this);
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
            });
        </script>

    </div>
</x-auth-layout>