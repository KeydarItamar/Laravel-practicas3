<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Benvingut administrador.</h1>

@if(count($profesores)>0)
<h2>Listado de profesores:</h2>
<table style="border: 1px solid black;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>  </th>
            <th>  </th>
        </tr>
    </thead>
    <tbody>
        @foreach($profesores as $profesor)
            @if($profesor->rol == 'professor')
                <tr>
                    <td>{{$profesor->id}}</td>
                    <td>{{$profesor->nombre}}</td>
                    <td>{{$profesor->email}}</td>
                    <td><a href="{{url('/editar/' . $profesor->id)}}">editar</a></td>
                    <td><form action="{{'/deleteProfe/'.$profesor->id}}" method="post">
                        @method("delete")
                        @csrf
                        <input type="submit" value="delete">
                    </form></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endif
<a href="/crearProfesorCentre">Crear Profesor</a>
<a href="/login">Volver</a>

</body>
</html>
