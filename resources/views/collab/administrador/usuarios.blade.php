<x-auth-layout>
    <div class="w-full max-w-6xl mx-auto space-y-6 flex flex-col items-center">
        <h2 class="text-2xl font-bold text-indigo-700 text-center">
            Usuarios en el sistema
        </h2>
        <form id="form-filtros" method="GET" action="{{ url()->current() }}"
            class="w-full bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-3 items-center justify-items-center font-bold">
            <input type="text" name="search"
                placeholder="Nombre o correo"
                value="{{ request('search') }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <select name="tipo" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Tipo</option>
                <option value="estudiante" {{ request('tipo') === 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                <option value="profesor" {{ request('tipo') === 'profesor' ? 'selected' : '' }}>Profesor</option>
                <option value="profesional" {{ request('tipo') === 'profesional' ? 'selected' : '' }}>Profesional</option>
            </select>
            <select name="sector" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Sector</option>
                <option value="educacion" {{ request('sector') === 'educacion' ? 'selected' : '' }}>Educación</option>
                <option value="tecnologia" {{ request('sector') === 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
                <option value="negocios" {{ request('sector') === 'negocios' ? 'selected' : '' }}>Negocios</option>
                <option value="salud" {{ request('sector') === 'salud' ? 'selected' : '' }}>Salud</option>
            </select>
            <select name="pais" class="w-full border border-gray-300 rounded-md px-3 py-2">
                <option value="">País</option>
                <option value="mexico">México</option>
                <option value="usa">USA</option>
                <option value="espania">España</option>
                <option value="canada">Canada</option>
                <option value="brazil">Brazil</option>
                <option value="china">China</option>
            </select>
            <select name="referencia" class="w-full border border-gray-300 rounded-md px-3 py-2">
                <option value="">Referencia</option>
                <option value="redes">Redes</option>
                <option value="amigos">Amigos</option>
                <option value="anuncio">Anuncio</option>
                <option value="empresa">Empresa</option>
            </select>
            <select name="carac_principal" class="w-full border border-gray-300 rounded-md px-3 py-2">
                <option value="">Interés</option>
                <option value="presencia">Presencia</option>
                <option value="chat">Chat</option>
                <option value="editor">Editor</option>
            </select>
            <a href="{{ url()->current() }}"
            class="w-full text-center bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition">
                Limpiar
            </a>
        </form>
        <div id="tabla_usuarios" class="w-full bg-white rounded-lg shadow p-4">
            @include('collab.administrador.parcial.panel')
        </div>
        <div class="w-full">
            <a href="{{ route('administrador.inicio')}}"
            class="block w-full text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition font-bold">
                Volver
            </a>
        </div>

    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form  = document.getElementById('form-filtros');
                const tabla = document.getElementById('tabla_usuarios');

                function cargarUsuarios() {
                    const params = new URLSearchParams(new FormData(form)).toString();
                    const url = window.location.pathname + '?' + params;

                    fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.text())
                    .then(html => {
                        tabla.innerHTML = html;
                        window.history.replaceState(null, '', url);
                    });
                }

                form.querySelector('[name="search"]').addEventListener('keyup', cargarUsuarios);
                form.querySelector('[name="tipo"]').addEventListener('change', cargarUsuarios);
                form.querySelector('[name="sector"]').addEventListener('change', cargarUsuarios);
                form.querySelector('[name="pais"]').addEventListener('change', cargarUsuarios);
                form.querySelector('[name="referencia"]').addEventListener('change', cargarUsuarios);
                form.querySelector('[name="carac_principal"]').addEventListener('change', cargarUsuarios);
            });
        </script>
    </div>
</x-auth-layout>