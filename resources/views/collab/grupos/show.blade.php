
<x-auth-layout>

<div class="max-w-6xl mx-auto py-8 space-y-6">

    <!-- Header del grupo -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">
            GRUPO: {{ $grupo->name }}
        </h1>
    </div>

    <!-- Mensajes -->
    @if (session('error'))
        <p class="text-red-500 font-semibold">{{ session('error') }}</p>
    @endif

    @if (session('success'))
        <p class="text-green-600 font-semibold">{{ session('success') }}</p>
    @endif

    <!-- Layout principal -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Columna izquierda: miembros -->
        <div class="bg-white shadow-md rounded-lg p-4 space-y-3">

            <h4 class="font-bold text-gray-700">Miembros</h4>

            <ol class="space-y-1 text-gray-600">
                @foreach ($grupo->users as $user)
                    <li>• {{ $user->name }}</li>
                @endforeach
            </ol>

            <h4 class="font-bold text-gray-700 pt-4">Usuarios en línea</h4>
            <ol id="usuarios_linea" class="text-sm text-green-600"></ol>

            <!-- Agregar usuario -->
            <form method="POST"
                  action="{{ route('grupos.addUser', $grupo->id) }}"
                  class="space-y-2 pt-4">

                @csrf

                <input type="email"
                       name="email"
                       placeholder="Correo del usuario"
                       class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">

                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                    Agregar
                </button>

            </form>

        </div>

        <!-- Centro: chat -->
        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col">

            <h4 class="font-bold text-gray-700 mb-3">Chat del grupo</h4>

            <div id="chat"
                 class="flex-1 border rounded-md p-3 h-64 overflow-y-auto space-y-2 bg-gray-50">

                @foreach ($grupo->mensajes as $mensaje)
                    <p>
                        <strong>{{ $mensaje->user->name }}:</strong>
                        {{ $mensaje->contenido }}
                    </p>
                @endforeach

            </div>

            <form method="POST"
                  action="{{ route('grupos.mensajes.store', $grupo->id) }}"
                  class="mt-3 flex gap-2">

                @csrf

                <input type="text"
                       name="contenido"
                       placeholder="Escribe un mensaje..."
                       class="flex-1 px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500">

                <button class="bg-indigo-600 text-white px-4 rounded-md hover:bg-indigo-700 transition">
                    Enviar
                </button>

            </form>

        </div>

        <!-- Derecha: editor -->
        <div class="bg-white shadow-md rounded-lg p-4">

            <h4 class="font-bold text-gray-700 mb-3">Editor compartido</h4>

            <textarea id="editor"
                      rows="15"
                      class="w-full border rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500">
                {{ $grupo->documento->contenido }}
            </textarea>

        </div>

    </div>

</div>
<!--Carga de Bootstrap.js-->
     @vite(['resources/js/app.js'])
<script>
    
        //document.addEventListener('DOMContentLoaded', function(){
        window.addEventListener('load', function () {
            const lista_usuarios = document.querySelector('#usuarios_linea');
            //Variables para editor compartido
            const editor = document.getElementById('editor');
            let timeout = null;
            let isUpdating = false;

            window.Echo.join('grupo.{{ $grupo->id }}')

            //Usuarios conectados
            .here((users) => {
                renderUsers(users);
            })
            //Entrada usuario
            .joining((user) =>{
                addUser(user);
            })
            //Salida usuario
            .leaving((user) => {
                removeUser(user);
            })
            
            //Mensajes
            .listen('.MensajeEnviado', (e) =>{
                //console.log('Evento recibido', e);
                const chat = document.querySelector('#chat');
                chat.innerHTML += `
                <p>
                    <strong>${e.mensaje.user.name}:</strong>
                    ${e.mensaje.contenido}
                    </p>
                    `;
            })

            //Editor
            //window.Echo.channel('grupo.{{ $grupo->id }}')
            .listen('.DocumentoActualizado', (e) => {
                //console.log('Evento Documento', e);
                //isUpdating = true;
                //editor.value = e.documento.contenido;
                //isUpdating = false;
                if(editor.value !== e.contenido){
                    isUpdating = true;
                    editor.value = e.contenido;
                    isUpdating = false;
                }
            });

            //Lista de presencia
            function renderUsers(users){
                lista_usuarios.innerHTML = '';
                users.forEach(user => addUser(user));
            }
            //Metodo para agregar usuario a lista
            function addUser(user){
                if(!document.getElementById('user-' + user.id)){
                    lista_usuarios.innerHTML += `
                    <li id="user-${user.id}"> En linea ${user.name}</li>
                    `
                }
            }
            //Metodo para quitar usuario de lista
            function removeUser(user){
                const el = document.getElementById('user-' + user.id);
                if(el) el.remove();
            }

            //Logica para editor compartido
            editor.addEventListener('input', function(){
                if(isUpdating) return;

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