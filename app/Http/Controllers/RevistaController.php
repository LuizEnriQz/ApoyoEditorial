<?php

namespace App\Http\Controllers;
use App\Models\Revista;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revistas = Revista::where('activo','=',1)->get();
        $trevistas = $this->cargaDT($revistas);
        return view('revistas.index')->with('revistas',$trevistas);
    }

    public function cargaDT($consulta)
    {
        $revistas = [];

        foreach ($consulta as $key =>$value){
            $ruta = "eliminar". $value['id'];
            $eliminar = route('borrarRevista', $value['id']);
            $edit = route('revistas.edit', $value['id']);
            $acciones = '';
            if (Auth::Check() && Auth::user()->role == 'admin'){
            $acciones = '<div class="btn-acciones">
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

            $revistas[$key] = array(
                $value['id'],
                $value['nombre'],
                $value['anio'],
                $value['edicion'],
                $value['ensayo'],
                $value['autores'],
                $value['descripcion'],
                $value['file'],
                $value['portada'],
                $acciones,
            );
        }
        return $revistas;
    }

    public function catalogo()
    {
        $revistas= Revista::get();
        return view('revistas.catalogo')->with('revistas',$revistas);
    }

    public function visitas()
    {
        $revistas = Revista::where('activo','=',1)->get();
        $vrevista = $this->cargaDTvisitas($revistas);
        return view('revistas.visitas')->with('revistas',$vrevista);
    }


    public function cargaDTvisitas($consulta)
    {
        $revista = [];

        foreach ($consulta as $key => $value){
            $eliminar = route('borrarRevista', $value['id']);
            $edit = route('revistas.edit', $value['id']);
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

            $revista[$key] = array(
                $value['id'],
                $value['nombre'],
                $value['descripcion'],

                $acciones,
            );
        }
        return $revista;
    }


    public function mostrarpdf($id)
    {
        $revistaEncontrada = Revista::find($id);

        $path = storage_path('app/public/revistas_pdfs/' . $revistaEncontrada->file);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $revistaEncontrada->file . '"'
        ];
        return response()->file($path, $header);
    }

//     public function mostrarimg($id)
//     {
//         $portadaEncontrada = Revista::find($id);
//
//         $path = storage_path('app/public/revistas_portada/' . $portadaEncontrada->portada);
//         $header = [
//             'Content-Type' => 'img/*',
//             'Content-Disposition' => 'inline; filename="' . $portadaEncontrada->portada . '"'
//         ];
//         return response()->file($path, $header);
//     }

    public function create()
    {
        return view('revistas.create');
    }


    public function store(Request $request)
    {
        $validateData = $this->validate($request,[
            'nombre'=>'required',
            'anio'=>'required',
            'edicion'=>'required',
            'ensayo'=>'required',
            'autores'=>'required',
            'descripcion'=>'required',
            'file'=>'required|mimes:pdf',
            'portada'=>'required|image|mimes:jpg,jpeg,gif,svg',
        ]);

        $revistas = new Revista();
        $revistas->nombre = $request->input('nombre');
        $revistas->anio = $request->input('anio');
        $revistas->edicion = $request->input('edicion');
        $revistas->ensayo = $request->input('ensayo');
        $revistas->autores = $request->input('autores');
        $revistas->descripcion = $request->input('descripcion');
        $revistas->file = $request->file->getClientOriginalName();
        $revistas->portada = $request->portada->getClientOriginalName();
        $revistas->activo= 1;
        $revistas->seccion_id = 3;
        $revistas->categoria=3;
        $revistas->save();

        if ($request->file);
        $nombreArchivo = $request->file->getClientOriginalName();
        $directorioArchivo = $request->file('file')->storeAs('public/revistas_pdfs', $nombreArchivo);
        $Revista_modelo = new Revista();
        $Revista_modelo->file_path = '/storage/app/public/' . $directorioArchivo;

        if ($request->portada);
        $nombrePortada = $request->portada->getClientOriginalName();
        $directorioArchivo = $request->file('portada')->storeAs('public/revistas_portada', $nombrePortada);
        $Revista_modelo = new Revista();
        $Revista_modelo->file_path = '/storage/app/public/' . $directorioArchivo;

        return redirect('revistas');
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
        $revista = Revista::find($id);
        return view('revistas.edit')->with('revista',$revista );
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
        $revista = Revista::find($id);
        $revista->nombre = $request->input('nombre');
        $revista->anio = $request->input('anio');
        $revista->edicion = $request->input('edicion');
        $revista->ensayo = $request->input('ensayo');
        $revista->autores = $request->input('autores');
        $revista->descripcion = $request->input('descripcion');
        $revista->update();
        return redirect('revistas');
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

    public function borrarRevista($id){
        $revista = Revista::find($id);
        $revista->activo = 0;
        $revista->update();

        return redirect('revistas');
    }
}
