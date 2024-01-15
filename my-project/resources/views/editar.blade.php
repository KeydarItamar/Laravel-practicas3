<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>editar profesor con el id: {{$profesor->id}}</h1>

    <form action="/editarUser" method="post">
        @method('put')
        @csrf
        <label for="number">numero</label>
        <input type="number" name="id" id="numero" value="{{$profesor->id}}">
        <br>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$profesor->nombre}}">
        <br>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" value="{{$profesor->apellidos}}">
        <br>

        <label for="contrasenya">Contraseña</label>
        <input type="password" id="contrasenya" name="contrasenya">
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{$profesor->email}}">
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
        <option value="estudiante">Estudiante</option>
        <option value="professor">Profesor</option>
        <option value="centre">Centro</option>
        </select><br>

        <label for="actiu">Activo:</label>
        <input type="checkbox" id="actiu" name="actiu"><br>
        <input type="submit">
    </form>
</body>
</html>