<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use App\Models\Vista_vs_Descarga;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::where('activo','=', 1)->get();
        $tnoticia = $this->cargaDT($noticias);
        return view('noticias.index')->with('noticias',$tnoticia);
    }

    public function cargaDT($consulta)
    {
        $noticias = [];

        foreach ($consulta as $key =>$value){
            //$ruta = "eliminar".$value['id'];
            $eliminar = route('borrarNoticia', $value['id']);
            $edit = route('noticias.edit', $value['id']);
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

            $noticias[$key] = array(

                // $value['id'],
                $value['titulo'],
                $value['fecha'],
                // $value['descripcion'],
                $value['file'],
                $acciones,
            );
    }
        return $noticias;
    }

    public function catalogo()
    {
        $noticias= Noticia::get();
        return view('noticias.catalogo')->with('noticias',$noticias);
    }

    public function visitas()
    {
        $noticias = Noticia::where('activo','=',1)->get();
        $vnoticia = $this->cargaDTvisitas($noticias);
        return view('noticias.visitas')->with('noticias',$vnoticia);
    }

    public function cargaDTvisitas($consulta)
    {
        $noticia = [];

        foreach ($consulta as $key => $value){

            $totalVisitas =  Vista_vs_Descarga::where("id_registro", $value['id'])->where('id_seccion',4)->where('visitas',1)->count();

            $totalDescargas =  Vista_vs_Descarga::where("id_registro", $value['id'])->where('id_seccion',4)->where('descargas','!=',0)->count();

            $acciones = '';
            if (Auth::Check() && Auth::user()->role == 'admin'){

        }

            $noticia[$key] = array(
                // $value['id'],
                $value['titulo'],
                // $value['descripcion'],
                $totalVisitas,
                $totalDescargas,
            );
        }
        return $noticia;
    }


    public function mostrarpdf($id)
    {
        $noticiaEncontrada = Noticia::find($id);

        $path = storage_path('app/public/noticias_pdfs/' . $noticiaEncontrada->file);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $noticiaEncontrada->file . '"'
        ];
        return response()->file($path, $header);

    }

    public function mostrarimg($id)
    {
        $noticiaEncontrada = Noticia::find($id);

        $path = storage_path('app/public/noticias_img/' . $noticiaEncontrada->file);
        $header = [
            'Content-Type' => 'img/*',
            'Content-Disposition' => 'inline; filename="' . $noticiaEncontrada->file . '"'
        ];
        return response()->file($path, $header);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
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
            'fecha'=>'required',
            // 'descripcion'=>'required',
            'file'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $noticias = new Noticia();
        $noticias->titulo = $request->input('titulo');
        $noticias->fecha = $request->input('fecha');
        $noticias->descripcion = $request->input('descripcion');
        $noticias->file = $request->file->getClientOriginalName();
        $noticias->activo=1;
        $noticias->categoria=2;
        $noticias->seccion_id = 4;

        $noticias->save();

        if ($request->file) {
            $nombreArchivo = $request->file->getClientOriginalName();
            $directorioArchivo = $request->file('file')->storeAs('public/noticias_img', $nombreArchivo);
            $Noticia_modelo = new Noticia();
            $Noticia_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
        }

        return redirect('noticias');
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
        $noticia = Noticia::find($id);

        return view('noticias.edit')->with('noticia',$noticia );
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
        $noticia = Noticia::find($id);
        $noticia->titulo = $request->input('titulo');
        $noticia->fecha = $request->input('fecha');
        $noticia->descripcion = $request->input('descripcion');

        if(isset($request->file)){
               $noticia->file = $request->file->getClientOriginalName();
               $directorioArchivo = $request->file('file')->storeAs('public/noticias_img', $noticia->file);
               $Noticia_modelo = new Libro();
               $Noticia_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
           }

        $noticia->update();
        return redirect('noticias');
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

    public function borrarNoticia($id)
    {
        $noticia= Noticia::find($id);
        $noticia->activo=0;
        $noticia->update();

        return redirect('noticias');
    }
}
