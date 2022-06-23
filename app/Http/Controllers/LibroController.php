<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::where('activo', '=', 1)->get();
        $tlibro = $this->cargaDT($libros);
        return view('libros.index')->with('libros',$tlibro);
    }

    public function cargaDT($consulta)
    {
        $libros = [];

        foreach ($consulta as $key => $value){
            //$ruta = "eliminar".$value['id'];
            $eliminar = route('borrarLibro', $value['id']);
            $edit =  route('libros.edit', $value['id']);
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

            $libros[$key] = array(

                $value['id'],
                $value['nombre'],
                $value['autores'],
                $value['anio'],
                $value['descripcion'],
                $value['file'],
                $value['portada'],
                $acciones,
            );
        }
        return $libros;
    }

    public function catalogo()
    {
        $libros= Libro::get();
        return view('libros.catalogo')->with('libros',$libros);
    }

    public function visitas()
    {
        $libros = Libro::where('activo','=',1)->get();
        $vlibros = $this->cargaDTvisitas($libros);
        return view('libros.visitas')->with('libros',$vlibros);
    }

    public function cargaDTvisitas($consulta)
    {
        $libro = [];

        foreach ($consulta as $key => $value){
            $eliminar = route('borrarlibro', $value['id']);
            $edit = route('libro.edit', $value['id']);
            $acciones = '';
            if (Auth::Check() && Auth::user()->role == 'admin'){
            $acciones = '
            <div class="btn-acciones">
                <div class= "col-md-sm2">
                <i class="fa-solid fa-eye"> = </i>
                <i class="fa-solid fa-download"> = </i>
                </div>
            </div>
            ';
        }

            $coleccion[$key] = array(
                $value['id'],
                $value['nombre'],
                $value['descripcion'],

                $acciones,
            );
        }
        return $coleccion;
    }

    public function mostrarpdf($id)
    {
        $libroEncontrado = Libro::find($id);

        $path = storage_path('app/public/libros_pdfs/' . $libroEncontrado->file);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $libroEncontrado->file . '"'
        ];
        return response()->file($path, $header);

    }

    public function mostrarimg($id)
    {
        $portadaEncontrada = Libro::find($id);

        $path = storage_path('app/public/libros_portada/' . $portadaEncontrada->portada);
        $header = [
            'Content-Type' => 'img/*',
            'Content-Disposition' => 'inline; filename="' . $portadaEncontrada->portada . '"'
        ];
        return response()->file($path, $header);
    }

    // public function imgcarrusel()
    // {
    //     $portadasLibros = DB::table('libros')
    //     ->select('portada as portadas')
    //     ->where('activo',1)
    //     ->get();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
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
            'nombre'=>'required',
            'anio'=>'required',
            'autores'=>'required',
            'descripcion'=>'required',
            'file'=>'required|mimes:pdf',
            'portada'=>'required|image|mimes:jpg,jpeg,gif,svg',

        ]);
        $libro = new Libro();
        $libro->nombre = $request->input('nombre');
        $libro->anio = $request->input('anio');
        $libro->autores = $request->input('autores');
        $libro->descripcion = $request->input('descripcion');
        $libro->file = $request->file->getClientOriginalName();
        $libro->portada = $request->portada->getClientOriginalName();
        $libro->activo = 1;
        $libro->categoria = 1;
        $libro->seccion_id = 2;

        $libro->save();

            if ($request->file) {
                $nombreArchivo = $request->file->getClientOriginalName();
                $directorioArchivo = $request->file('file')->storeAs('public/libros_pdfs', $nombreArchivo);
                $Libro_modelo = new Libro();
                $Libro_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
            }


            if ($request->portada) {
                $nombrePortada = $request->portada->getClientOriginalName();
                $directorioArchivo = $request->file('portada')->storeAs('public/libros_portada', $nombrePortada);
                $Libro_modelo = new Libro();
                $Libro_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
            }

        return redirect('libros');
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
        $libro = Libro::find($id);


        return view('libros.edit')->with('libro',$libro );
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
        $libro = Libro::find($id);
        $libro->nombre = $request->input('nombre');
        $libro->anio = $request->input('anio');
        $libro->autores = $request->input('autores');
        $libro->descripcion = $request->input('descripcion');
        $libro->update();
        return redirect('libros');
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

    public function borrarLibro($id){

        $libro = Libro::find($id);
        $libro->activo = 0;
        $libro->update();

        return redirect('libros');
    }
}

