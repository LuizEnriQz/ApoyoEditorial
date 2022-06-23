<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Revista;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /** public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $portadasColecciones = DB::table('colecciones')
        ->select('portada as portadas')
        ->where('activo',1)
        ->where('portada','<>','')
        ->get();
        //dd($portadas);

        $portadasRevistas = DB::table('revistas')
        ->select('portada as portadas')
        ->where('activo',1)
        ->where('portada','<>','')
        ->get();
        //dd($portadas);

        $portadasLibros = DB::table('libros')
        ->select('portada as portadas')
        ->where('activo',1)
        ->where('portada','<>','')
        ->get();
        //dd($portadas);

        $portadasNoticias = DB::table('noticias')
        ->select('file as portadas')
        ->where('activo',1)
        ->where('file','<>','')
        ->get();
        //dd($portadas);

        return view('home')
        ->with('portadasColecciones',$portadasColecciones)
        ->with('portadasRevistas',$portadasRevistas)
        ->with('portadasLibros',$portadasLibros)
        ->with('portadasNoticias',$portadasNoticias)
        ;
    }


}
