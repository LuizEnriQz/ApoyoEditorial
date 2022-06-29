<?php

namespace App\Http\Controllers;
use App\Models\Coleccion;
use App\Models\Vista_vs_Descarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $colecciones = Coleccion::where('activo','=',1)->get();
    $tcoleccion = $this->cargaDT($colecciones);
    return  view('colecciones.index')->with('colecciones',$tcoleccion);    }

    public function  cargaDT($consulta)
    {
        $coleccion = [];

        foreach ($consulta as $key => $value){
            $eliminar = route('borrarColeccion', $value['id']);
            $edit = route('colecciones.edit', $value['id']);
            $acciones = '';
            if (Auth::Check() && Auth::user()->role == 'admin'){
            $acciones = '
            <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="'.$edit.'" role="button" class="btn btn-success" title="Actualizar">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="'.$eliminar.'" role="button" class="btn btn-danger" data-toggle="modal" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            ';
        }

            $coleccion[$key] = array(
                $value['id'],
                $value['titulo'],
                $value['coordinadores'],
                $value['descripcion'],
                $value['anio'],
                $value['paginas'],
                $value['tema'],
                $value['coleccion'],
                $value['isbn'],
                $value['novedad'],
                $value['file'],
                $value['portada'],
                $value['categoria'],

                $acciones,
            );
        }
        return $coleccion;
    }

    public function catalogo()
    {
        $novedades= Coleccion::get();
        return view('colecciones.catalogo')->with('novedades', $novedades);
    }


    public function visitas()
    {
        $colecciones = Coleccion::where('activo','=',1)->get();
        $vcoleccion = $this->cargaDTvisitas($colecciones);
        return  view('colecciones.visitas')->with('colecciones',    $vcoleccion);
    }


    public function cargaDTvisitas($consulta)
    {
        $coleccion = [];
        // dd($consulta);

        foreach ($consulta as $key => $value){

            $totalVisitas =  Vista_vs_Descarga::where("id_registro", $value['id'])->where('id_seccion',1)->where('visitas',1)->count();

            $totalDescargas =  Vista_vs_Descarga::where("id_registro", $value['id'])->where('id_seccion',1)->where('descargas','!=',0)->count();

            $acciones = '';
            if (Auth::Check() && Auth::user()->role == 'admin'){
        }

            $coleccion[$key] = array(
                $value['id'],
                $value['titulo'],
                $value['descripcion'],
                $value['anio'],
                $value['isbn'],
                $value['categoria'],
                $totalVisitas,
                $totalDescargas,
            );
        }
        return $coleccion;
    }

    public function mostrarpdf($id)
    {
        $coleccionEncontrado = Coleccion::find($id);

        $path = storage_path('app/public/colecciones_pdfs/' . $coleccionEncontrado->file);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $coleccionEncontrado->file . '"'
        ];
        return response()->file($path, $header);

    }

//     public function mostrarimg($id)
//     {
//         $portadaEncontrada = Coleccion::find($id);
//
//         $path = storage_path('app/public/colecciones_portada/' . $portadaEncontrada->portada);
//         $header = [
//             'Content-Type' => 'img/*',
//             'Content-Disposition' => 'inline; filename="' . $portadaEncontrada->portada . '"'
//         ];
//         return response()->file($path, $header);
//     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colecciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validate($request,[
        'titulo'=>'required',
        'coordinadores'=>'required',
        'descripcion'=>'required',
        'anio'=>'required',
        'paginas'=>'required',
        'tema'=>'required',
        'coleccion'=>'required',
        'isbn'=>'required',
        'novedad'=>'required',
        'categoria'=>'required',
        'file'=>'required|mimes:pdf',
        'portada'=>'required|image|mimes:jpg,jpeg,gif,png,svg',

    ]);
        $coleccion = new Coleccion();
        $coleccion->titulo = $request->input('titulo');
        $coleccion->coordinadores = $request->input('coordinadores');
        $coleccion->descripcion = $request->input('descripcion');
        $coleccion->anio = $request->input('anio');
        $coleccion->paginas = $request->input('paginas');
        $coleccion->tema = $request->input('tema');
        $coleccion->coleccion = $request->input('coleccion');
        $coleccion->isbn = $request->input('isbn');
        $coleccion->novedad = $request->input('novedad');
        $coleccion->categoria = $request->input('categoria');
        $coleccion->file = $request->file->getClientOriginalName();
        $coleccion->portada = $request->portada->getClientOriginalName();
        $coleccion->activo = 1;
        $coleccion->seccion_id = 1;

        $coleccion->save();

        if ($request->file) {
            $nombreArchivo = $request->file->getClientOriginalName();
            $directorioArchivo = $request->file('file')->storeAs('public/colecciones_pdfs', $nombreArchivo);
            $Coleccion_modelo = new Coleccion();
            $Coleccion_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
        }


        if ($request->portada) {
            $nombrePortada = $request->portada->getClientOriginalName();
            $directorioArchivo = $request->file('portada')->storeAs('public/colecciones_portada', $nombrePortada);
            $Coleccion_modelo = new Coleccion();
            $Coleccion_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
        }

        return redirect('colecciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coleccion = Coleccion::find($id);
        return view('colecciones.edit')->with('coleccion',$coleccion );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $coleccion = Coleccion::find($id);
       $coleccion->titulo = $request->input('titulo');
       $coleccion->coordinadores = $request->input('coordinadores');
       $coleccion->descripcion = $request->input('descripcion');
       $coleccion->anio = $request->input('anio');
       $coleccion->paginas = $request->input('paginas');
       $coleccion->tema = $request->input('tema');
       $coleccion->coleccion = $request->input('coleccion');
       $coleccion->isbn = $request->input('isbn');
       $coleccion->novedad = $request->input('novedad');
       $coleccion->categoria = $request->input('categoria');
       $coleccion->update();

       return redirect('colecciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function borrarColeccion($id){

        $coleccion = Coleccion::find($id);
        $coleccion->activo = 0;
        $coleccion->update();

        return redirect('colecciones');
    }
}
