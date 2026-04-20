<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grupos</title>
</head>
<body>
    <h1>Crear nuevo grupo</h1>

    <form method="POST" action="/grupos">
      @csrf

      <input type="text" name="name" placeholder="maximo 50 caracteres">
      <button type="submit">Crear</button>

    </form>
</body>
</html>