<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Benvingut alumne. El teu email és:{{$usuario['email']}}</h1>
    <br>
    <h2>Poema autogenerado con chat gpt con tu nombre: {{$usuario->nombre}}</h2>
    <p>{{$poema}}</p>
    <br>
    <a href="/login">Volver</a>

</body>
</html>
