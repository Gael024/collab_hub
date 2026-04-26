<x-auth-layout>
    <div class="max-w-6xl mx-auto p-6 space-y-6">
        <h1 class="text-3xl font-bold text-indigo-700 text-center">
            GRUPO: {{ $grupo->name }}
        </h1>
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- MIEMBROS -->
            <div class="bg-white shadow rounded-lg p-4">
                <h4 class="text-lg font-semibold text-gray-700 mb-3">Miembros del grupo</h4>
                <ol class="list-decimal pl-5 space-y-1 text-gray-600">
                    @foreach ($grupo->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ol>
            </div>
            <!-- USUARIOS EN LÍNEA -->
            <div class="bg-white shadow rounded-lg p-4">
                <h4 class="text-lg font-semibold text-gray-700 mb-3">Usuarios activos</h4>
                <ol id="usuarios_linea" class="space-y-1 text-green-600 font-medium"></ol>
            </div>

        </div>
        <!-- AGREGAR USUARIO -->
        <div class="bg-white shadow rounded-lg p-4">
            <h4 class="text-lg font-semibold text-gray-700 mb-3">Agregar participante</h4>
            <form method="POST" action="{{ route('grupos.addUser', $grupo->id) }}"
                class="flex flex-col md:flex-row gap-3">
                @csrf
                <input type="email" name="email"
                    class="flex-1 border rounded p-2"
                    placeholder="Correo del usuario">
                <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Agregar
                </button>
            </form>
        </div>
        <!-- CHAT -->
        <div class="bg-white shadow rounded-lg p-4">
            <h4 class="text-lg font-semibold text-gray-700 mb-3">Chat del grupo</h4>

            <div id="chat"
                class="border rounded p-3 h-64 overflow-y-auto bg-gray-50 space-y-2">
                @foreach ($grupo->mensajes as $mensaje)
                    <p class="text-sm">
                        <strong class="text-indigo-600">{{ $mensaje->user->name }}:</strong>
                        {{ $mensaje->contenido }}
                    </p>
                @endforeach
            </div>
            <form method="POST"
                action="{{ route('grupos.mensajes.store', $grupo->id) }}"
                class="mt-3 flex gap-2">
                @csrf
                <input type="text" name="contenido"
                    class="flex-1 border rounded p-2"
                    placeholder="Escriba su mensaje">

                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Enviar
                </button>
            </form>
        </div>
        <!-- EDITOR -->
        <div class="bg-white shadow rounded-lg p-4">
            <h4 class="text-lg font-semibold text-gray-700 mb-3">Editor compartido</h4>
            <textarea id="editor" class="w-full border rounded p-3 h-64 resize-none">
                {{ $grupo->documento->contenido }}
            </textarea>
        </div>

    </div>

    @vite(['resources/js/app.js'])

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const lista_usuarios = document.querySelector('#usuarios_linea');
        const editor = document.getElementById('editor');
        let timeout = null;
        let isUpdating = false;

        window.Echo.join('grupo.{{ $grupo->id }}')

        .here((users) => renderUsers(users))
        .joining((user) => addUser(user))
        .leaving((user) => removeUser(user))

        .listen('.MensajeEnviado', (e) => {
            const chat = document.querySelector('#chat');
            chat.innerHTML += `
                <p>
                    <strong>${e.mensaje.user.name}:</strong>
                    ${e.mensaje.contenido}
                </p>
            `;
            chat.scrollTop = chat.scrollHeight;
        })

        .listen('.DocumentoActualizado', (e) => {
            if (editor.value !== e.contenido) {
                isUpdating = true;
                editor.value = e.contenido;
                isUpdating = false;
            }
        });

        function renderUsers(users){
            lista_usuarios.innerHTML = '';
            users.forEach(addUser);
        }

        function addUser(user){
            if (!document.getElementById('user-' + user.id)) {
                lista_usuarios.innerHTML += `
                    <li id="user-${user.id}" class="text-green-600">
                        ● ${user.name}
                    </li>
                `;
            }
        }

        function removeUser(user){
            const el = document.getElementById('user-' + user.id);
            if (el) el.remove();
        }

        editor.addEventListener('input', function () {
            if (isUpdating) return;

            clearTimeout(timeout);
            timeout = setTimeout(() => {
                fetch("{{ route('documentos.update', $grupo->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        contenido: editor.value
                    })
                });
            }, 500);
        });

    });
</script>

</x-auth-layout>