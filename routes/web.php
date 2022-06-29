<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admindash');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[App\Http\Controllers\adminDashController::class, 'index'])->name('admindash');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admindash', [App\Http\Controllers\adminDashController::class, 'index'])->name('admindash');


Route::resource('libros','App\Http\Controllers\LibroController')->middleware('auth');
Route::resource('revistas','App\Http\Controllers\RevistaController')->middleware('auth');
Route::resource('noticias','App\Http\Controllers\NoticiaController')->middleware('auth');
Route::resource('administrativos','App\Http\Controllers\AdministrativoController')->middleware('auth');
Route::resource('colecciones','App\Http\Controllers\ColeccionController')->middleware('auth');
Route::resource('articulos','App\Http\Controllers\ArticuloController')->middleware('auth');



// borrado logico route

Route::get('/borrarLibro/{id}', array(
    'as'=>'borrarLibro',
    'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\LibroController@borrarLibro'
));
Route::get('/borrarNoticia/{id}', array(
   'as'=>'borrarNoticia',
   'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\NoticiaController@borrarNoticia'
));
Route::get('/borrarRevista/{id}', array(
    'as'=>'borrarRevista',
    'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\RevistaController@borrarRevista'
));
Route::get('/borrarAdministrativo/{id}', array(
    'as'=>'borrarAdministrativo',
    'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\AdministrativoController@borrarAdministrativo'
));
Route::get('/borrarArticulo/{id}', array(
    'as'=>'borrarArticulo',
    'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\ArticuloController@borrarArticulo'
));
Route::get('/borrarColeccion/{id}', array(
    'as'=>'borrarColeccion',
    'middleware' => 'auth',
    'uses' =>'App\Http\Controllers\ColeccionController@borrarColeccion'
));
// search route

Route::post('/search', array(
    'as'=> 'search',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\BuscarController@search'
));

//Mostrar secciones Routes (PDF)

Route::get('/mostrarLibro/{id}', array(
    'as'=> 'mostrarLibro',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\LibroController@mostrarpdf'
));

Route::get('/mostrarNoticia/{id}', array(
    'as'=> 'mostrarNoticia',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\NoticiaController@mostrarpdf'
));

Route::get('/mostrarRevista/{id}', array(
    'as'=> 'mostrarRevista',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\RevistaController@mostrarpdf'
));

Route::get('/mostrarColeccion{id}', array(
    'as'=> 'mostrarColeccion',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\ColeccionController@mostrarpdf'
));

//Mostrar secciones Routes (IMG)

Route::get('/mostrarNoticiaImg/{id}', array(
    'as'=> 'mostrarNoticiaImg',
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\NoticiaController@mostrarimg'
));


//catalogo Routes

Route::get('/catalogoColeccion', array(
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\ColeccionController@catalogo'
))->name('colecciones.catalogo');

Route::get('/catalogoNoticia', array(
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\NoticiaController@catalogo'
))->name('noticias.catalogo');

Route::get('/catalogoLibro', array(
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\LibroController@catalogo'
))->name('libros.catalogo');

Route::get('/catalogoRevista', array(
    // 'middleware'=> 'auth',
    'uses'=>'App\Http\Controllers\RevistaController@catalogo'
))->name('revistas.catalogo');



// Routes de conteo visitas y descargas

    Route::get('/visitasNovedades', array(
        'middleware'=> 'auth',
        'uses'=>'App\Http\Controllers\ColeccionController@visitas'
    ))->name('colecciones.visitas');

    Route::get('/visitasNoticias', array(
        'middleware'=> 'auth',
        'uses'=>'App\Http\Controllers\NoticiaController@visitas'
    ))->name('noticias.visitas');

    Route::get('/visitasLibros', array(
        'middleware'=> 'auth',
        'uses'=>'App\Http\Controllers\LibroController@visitas'
    ))->name('libros.visitas');

    Route::get('/visitasRevistas', array(
        'middleware'=> 'auth',
        'uses'=>'App\Http\Controllers\RevistaController@visitas'
    ))->name('revistas.visitas');



//Rutas del usuario visitante para el conteo de de vistas

Route::get('/leerNovedad/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@leerNovedad'
))->name('visitante.leerNovedad');

Route::get('/leerLibro/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@leerLibro'
))->name('visitante.leerLibro');

Route::get('/leerRevista/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@leerRevista'
))->name('visitante.leerRevista');

Route::get('/leerNoticia/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@leerNoticia'
))->name('visitante.leerNoticia');

//Rutas del usuario visitante para el conteo de de descargas

Route::get('/descargarNovedad/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@descargarNovedad'
))->name('visitante.descargarNovedad');

Route::get('/descargarLibro/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@descargarLibro'
))->name('visitante.descargarLibro');

Route::get('/descargarRevista/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@descargarRevista'
))->name('visitante.descargarRevista');

Route::get('/descargarNoticia/{id}/{nombre_archivo}', array(
    'uses'=>'App\Http\Controllers\VisitanteController@descargarNoticia'
))->name('visitante.descargarNoticia');




