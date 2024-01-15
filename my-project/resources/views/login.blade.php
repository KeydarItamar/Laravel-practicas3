<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="/login" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <p></p>
        <label for="" method="post">password</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" name="enviar">
        <a href="crear"></a>
    </form>
    <a href="/crearUsuari">Crear Usuari</a>
</body>
</html>