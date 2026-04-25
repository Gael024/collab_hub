<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    <h2>Usuarios en el sistema</h2>

    <form method="GET" action="{{ url()->current() }}">
        <input type="text" name="search" placeholder="Nombre o correo" value="{{ request('search') }}"> 

        <select name="tipo">
            <option value="">Tipo</option>
            <option value="estudiante" {{ request('tipo') =='estudiante' ? 'selected' : '' }}>Estudiante</option>
            <option value="profesor" {{ request('tipo') =='profesor' ? 'selected' : '' }}>Profesor</option>
            <option value="profesional" {{ request('tipo') =='profesional' ? 'selected' : '' }}>Profesional</option>
        </select>

        <select name="sector">
            <option value="">Sector</option>
            <option value="educacion" {{ request('sector')== 'educacion' ? 'selected' : '' }}>Educación</option>
            <option value="tecnologia" {{ request('sector')== 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
            <option value="negocios" {{ request('sector')== 'negocios' ? 'selected' : '' }}>Negocios</option>
            <option value="salud" {{ request('sector')== 'salud' ? 'selected' : '' }}>Salud</option>            
        </select>

        <select name="pais">
            <option value="">Pais</option>
            <option value="mexico"{{ request('pais') == 'mexico' ? 'selected' : '' }}>México</option>
            <option value="usa"{{ request('pais') == 'usa' ? 'selected' : '' }}>USA</option>
            <option value="espania"{{ request('pais') == 'espania' ? 'selected' : '' }}>España</option>
            <option value="canada"{{ request('pais') == 'canada' ? 'selected' : '' }}>Canada</option>
            <option value="brazil"{{ request('pais') == 'brazil' ? 'selected' : '' }}>Brazil</option>
            <option value="china"{{ request('pais') == 'china' ? 'selected' : '' }}>China</option>
        </select>

        <select name="referencia">
            <option value="">Referencia</option>
            <option value="redes" {{ request('referencia') == 'redes' ? 'selected' : '' }}>Redes</option>
            <option value="amigos" {{ request('referencia') == 'amigos' ? 'selected' : '' }}>Amigos</option>
            <option value="anuncio" {{ request('referencia') == 'anuncio' ? 'selected' : '' }}>Anuncio</option>
            <option value="empresa" {{ request('referencia') == 'empresa' ? 'selected' : '' }}>Empresa</option>
        </select>

        <select name="carac_principal">
            <option value="">Interes</option>
            <option value="presencia" {{ request('carac_principal') == 'presencia' ? 'selected' : '' }}>Presencia</option>
            <option value="chat" {{ request('carac_principal') == 'chat' ? 'selected' : '' }}>Chat</option>
            <option value="editor" {{ request('carac_principal') == 'editor' ? 'selected' : '' }}>Editor</option>
        </select>

        <button type="submit">Filtrar<button>
        <button><a href="{{ url()->current() }}">Limpiar</a></button>
    </form>


    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Tipo</th>
                <th>Sector</th>
                <th>Procedencia</th>
                <th>País</th>
                <th>Estado</th>
                <th>Referencia</th>
                <th>Interes</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->apellido}}</td>
                <td>{{ $user->edad }}</td>
                <td>{{ $user->tipo }}</td>
                <td>{{ $user->sector}}</td>
                <td>{{ $user->procedencia }}</td>
                <td>{{ $user->pais}}</td>
                <td>{{ $user->estado}}</td>
                <td>{{ $user->referencia}}</td>
                <td>{{ $user->carac_principal}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->celular}}</td>
                <td>{{ $user->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

    <a href="/">Volver</a>
</body>
</html>