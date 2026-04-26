
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

       