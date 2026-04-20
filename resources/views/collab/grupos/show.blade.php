<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VistaIndividual</title>
</head>
<body>
    <h1>GRUPO: {{ $grupo->name}}</h1>
    <!--Mensajes de validación para registro de usuarios-->
    @if (@session('error'))
    <p>{{ session('error') }}</p>
    @endif

    @if (@session('success'))
    <p>{{ session('success') }}</p>
    @endif
    
    <h4>Miembros del grupo</h4>
    <ol>
        @foreach ($grupo->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ol>

    <h4>Usuarios activos</h4>
    <ol id="usuarios_linea"></ol>

    <h4>Agregar participante</h4>
    <form method="POST" action="{{ route('grupos.addUser', $grupo->id) }}">
        @csrf

        <input type="email" name="email" placeholder="Correo del usuario">
        <button type="submit">Agregar</button>

    </form>
    
    <h4>Chat del grupo</h4>
    <!--Espacio para ver los mensajes-->
    <div id="chat" style="border:1px solid #ccc; padding:10px; height:200px; overflow-y:scroll;">
        @foreach ($grupo->mensajes as $mensaje)
            <p>
                <strong>{{ $mensaje->user->name }}:</strong>
                {{ $mensaje->contenido}}
            </p>
        @endforeach

    </div>
    <!--Formulario para envio de mensajes-->
    <form method="POST" action="{{ route('grupos.mensajes.store', $grupo->id) }}">
        @csrf
        <input type="text" name="contenido" placeholder="Escriba su mensaje">
        <button type="submit">Enviar</button>

    </form>

    <!--Editor compartido-->
    <h4>Editor compartido</h4>

    <textarea id="editor" rows="10" style="width:100%;">
        {{ $grupo->documento->contenido }}
    </textarea>
  
    
    <!--Carga de Bootstrap.js-->
     @vite(['resources/js/app.js'])
    <!---->
    <script>
        document.addEventListener('DOMContentLoaded', function(){
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
       

</body>
</html>