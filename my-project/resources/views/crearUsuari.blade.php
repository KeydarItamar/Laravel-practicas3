<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <h1>Creacion de usuario</h1>
    <form action="/usuarioCreado" method="post">
        @csrf
        <label for="numero">numero</label>
        <input type="number" name="numero" id="numero">
        <br>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <br>

        <label for="contrasenya">Contraseña</label>
        <input type="password" id="contrasenya" name="contrasenya">
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
        <option value="estudiante">Estudiante</option>
        <option value="professor">Profesor</option>
        <option value="centre">Centro</option>
        </select><br>

        <label for="actiu">Activo:</label>
        <input type="checkbox" id="actiu" name="actiu" checked><br>
        <input type="submit">
    </form>

    <a href="/login">Iniciar sesion con usuario</a>
</body>
</html>