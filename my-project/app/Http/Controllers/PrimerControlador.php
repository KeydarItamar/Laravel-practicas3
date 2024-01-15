<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use OpenAI;
class PrimerControlador extends Controller{

    function prueba($palabra){
        if ($palabra == null) {
            return;
        }
        $OPENAI_API_KEY='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';
        $title = 'Haz un chiste sencillo de maximo 3 lineas, con el nombre: '.$palabra ;
    
        $client = OpenAI::client($OPENAI_API_KEY);
    
        $result = $client->completions()->create([
            "model" => "gpt-3.5-turbo-instruct",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'prompt' => sprintf('Write article about: %s', $title),
        ]);
    
        $content = trim($result['choices'][0]['text']);
    
    
        return $content;
    }

    function controlUsuaris(Request $request){

        $usuario = Usuario::where('email', $request->email, 'contrasenya',$request->contrasenya)
            ->first();


        if ($usuario) {
            switch ($usuario->rol) {
                case 'estudiante':
                    $poema= $this->prueba($usuario->nombre);
                    return view('emails.alumno')->with('usuario',$usuario)
                    ->with('poema', $poema);
                    break;
                case 'professor':
                    $alumnos = Usuario::where('rol','estudiante')->get();
                    return view('emails.profesor')->with('usuario',$usuario)->with('alumnos',$alumnos);
                    break;
                case 'centre':
                    $profesores = Usuario::where('rol','professor')->get();
                    return view('emails.centre')->with('usuario',$usuario)->with('profesores',$profesores);
                    break;
                default:
                    return view('errorAcces');
            }
        } else {
            return view('errorAcces');
        }
        
    }

    function crearUsuario(Request $request){
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'contrasenya' => $request->contrasenya,
            'email' => $request->email,
            'rol' => $request->rol,
            'actiu' => $request->has('actiu') ? $request->actiu : true,
        ]);

        $usuario->save();

        return view('usuarioCreado');
    }
    
    function profesorUsuario(Request $request){
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'contrasenya' => $request->contrasenya,
            'email' => $request->email,
            'rol' => $request->rol,
            'actiu' => $request->has('actiu') ? $request->actiu : true,
        ]);

        $usuario->save();

        $profesores = Usuario::where('rol','professor')->get();
        return view('emails.centre')->with('profesores',$profesores);
    }
    function alumnoUsuario(Request $request){
        $usuario = new Usuario([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'contrasenya' => $request->contrasenya,
            'email' => $request->email,
            'rol' => $request->rol,
            'actiu' => $request->has('actiu') ? $request->actiu : true,
        ]);

        $usuario->save();

        $alumnos = Usuario::where('rol','estudiante')->get();
        return view('emails.profesor')->with('alumnos',$alumnos);
    }

    function datosUsuario() {
        $nombre = request('nombre');
        $apellidos = request('apellidos');
        $email = request('email');

        return view('mostrarUsuario')->with([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
        ]);
    }

    
    function show($id){
        $profesor = Usuario::find($id);
        return view("editar")->with('profesor', $profesor);
    }
    function showAlumno($id){
        $alumno = Usuario::find($id);
        return view("editarAlumno")->with('alumno', $alumno);
    }

    function deleteProfe($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        $profesores = Usuario::where('rol','professor')->get();
        return view('emails.centre')->with('profesores',$profesores);
    }
    
    function deleteAlumno($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        $alumnos = Usuario::where('rol','estudiante')->get();
        return view('emails.profesor')->with('alumnos',$alumnos);
    }
    
    function editarUser(Request $request){

        $usuario = Usuario::find($request->id);

        $usuario->nombre = $request->nombre; 
        $usuario->apellidos = $request->apellidos; 
        $usuario->email = $request->email; 
        $usuario->rol= $request->rol;

        $usuario->save();
        $profesores = Usuario::where('rol','professor')->get();
        return view('emails.centre')->with('profesores',$profesores);
    }
    
    function editarUserAlumno(Request $request){

        $usuario = Usuario::find($request->id);

        $usuario->nombre = $request->nombre; 
        $usuario->apellidos = $request->apellidos; 
        $usuario->email = $request->email; 
        $usuario->rol= $request->rol;

        $usuario->save();
        $alumnos = Usuario::where('rol','estudiante')->get();
        return view('emails.profesor')->with('alumnos',$alumnos);
    }
}
