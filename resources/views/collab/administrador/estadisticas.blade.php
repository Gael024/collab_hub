<x-auth-layout>
    <div class="w-full max-w-6xl mx-auto space-y-8">
        <h1 class="text-3xl font-bold text-indigo-700 text-center">Estadísticas del sistema</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Usuarios por edad</h4>
                <canvas id="grafica_usuarios_edad"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Usuarios por tipo</h4>
                <canvas id="grafica_usuarios_tipo"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Usuarios por sector</h4>
                <canvas id="grafica_usuarios_sector"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Institución de procedencia</h4>
                <canvas id="grafica_usuarios_procedencia"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Usuarios por país</h4>
                <canvas id="grafica_usuarios_pais"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Medios de referencia</h4>
                <canvas id="grafica_usuarios_referencia"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Características importantes</h4>
                <canvas id="grafica_usuarios_caracteristicas"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h4 class="font-semibold mb-2">Tipo vs característica</h4>
                <canvas id="grafica_tipo_contra_caracteristica"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow md:col-span-2">
                <h4 class="font-semibold mb-2">Tipo vs referencia</h4>
                <canvas id="grafica_tipo_contra_referencias"></canvas>
            </div>
        </div>
        <div class="w-full max-w-6xl mx-auto grid grid-cols-2 gap-4 pt-4">  
            <a href="{{ route('administrador.inicio') }}" class="w-full text-center bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition font-bold">
                Regresar al inicio
            </a>
            <a href="{{ route('administrador.usuarios') }}" class="w-full text-center bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition font-bold">
                Ir al panel de usuarios
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.graficoData = {
            usuariosPorEdad: {!! json_encode($usuariosPorEdad) !!},
            usuariosPorTipo: {!! json_encode($usuariosPorTipo) !!},
            usuariosPorSector: {!! json_encode($usuariosPorSector) !!},
            usuariosPorProcedencia: {!! json_encode($usuariosPorProcedencia) !!},
            usuariosPorPais: {!! json_encode($usuariosPorPais) !!},
            usuariosPorReferencia: {!! json_encode($usuariosPorReferencia) !!},
            usuariosPorCaracteristica: {!! json_encode($usuariosPorCaracteristica) !!},
            radarCaracteristicas: {!! json_encode($radarCaracteristicas) !!},
            radarReferencias: {!! json_encode($radarReferencias) !!}
        };
    </script>
    @vite(['resources/js/grafica.js'])
</x-auth-layout>