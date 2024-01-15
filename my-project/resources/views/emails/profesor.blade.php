<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Benvingut professor</h1>

<h2>Listado de alumnos:</h2>
<table style="border: 1px solid black;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
            @if($alumno->rol == 'estudiante')
                <tr>
                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->email}}</td>
                    <td><a href="{{url('/editarAlumno/' . $alumno->id)}}">editar</a></td>
                    <td><form action="{{'/deleteAlumno/'.$alumno->id}}" method="post">
                        @method("delete")
                        @csrf
                        <input type="submit" value="delete">
                    </form></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<br>
<a href="/crearAlumno">Crear alumno</a>
<a href="/login">Volver</a>

</body>
</html>