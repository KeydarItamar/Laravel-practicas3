<?php

use App\Http\Controllers\PrimerControlador;
use App\Http\Controllers\signController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('welcome');
});
//Ruta simple al signin
Route::get('/sign/signin', function () {
    return view('signin');
});

//ruta simple al signup
Route::get('/sign/signup', function () {
    return view('signup');
});

//ruta simple al signup
// Route::get('/sign/signup/{creacio}/{usuario}/{nou}', function ($creacio, $usuari, $nou) {
//     $frase = $creacio . ' '. $usuari . ' ' . $nou;
//     return view('signup')-> with('frase', $frase);
// });


Route::post('/login', [PrimerControlador::class, 'controlUsuaris'])->name('controlerEmail')->middleware('web','email');  
Route::post('/usuarioCreado', [PrimerControlador::class, 'crearUsuario'])->name('controlerEmail')->middleware('web','email');  
Route::post('/profesorCreado', [PrimerControlador::class, 'profesorUsuario'])->name('controlerEmail')->middleware('web','email');  
Route::post('/alumnoCreado', [PrimerControlador::class, 'alumnoUsuario'])->name('controlerEmail')->middleware('web','email');  
Route::get('/editar/{id}', [PrimerControlador::class, 'show']); 
Route::get('/editarAlumno/{id}', [PrimerControlador::class, 'showAlumno']); 
Route::put('/editarUser', [PrimerControlador::class, 'editarUser']); 
Route::put('/editarUserAlumno', [PrimerControlador::class, 'editarUserAlumno']); 
Route::delete('/deleteProfe/{id}', [PrimerControlador::class, 'deleteAlumno']); 
Route::delete('/deleteAlumno/{id}', [PrimerControlador::class, 'deleteAlumno']); 
Route::get('/error', function () {
    return view('errorAcces');
})->name('errorAcces');

Route::get('/crearUsuari',function (){
    return view('crearUsuari');
})->name('/crearUsuari');
Route::get('/crearProfesorCentre',function (){
    return view('crearProfesorCentre');
});
Route::get('/crearAlumno',function (){
    return view('crearAlumno');
});

Route::get('/login',function(){
    return view('login');
})->name('web_login');

Route::post('/mostrarUsuario', [PrimerControlador::class, 'datosUsuario'])->middleware('web');

Route:: get('/alumnes',function(){
    $alumnos = Usuario:: all();
    return view('emails.allAlumnos')->with('alumnos',$alumnos);
});

