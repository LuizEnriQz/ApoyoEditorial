<?php

namespace App\Http\Controllers;
use App\Models\Administrativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrativos = Administrativo::where('activo','=',1)->get();
        $tadministrativo = $this->cargaDT($administrativos);
        return  view('administrativos.index')->with('administrativos',$tadministrativo);
    }

    public function  cargaDT($consulta)
    {
        $administrativos = [];

        foreach ($consulta as $key => $value){
            $eliminar = route('borrarAdministrativo', $value['id']);
            $edit = route('administrativos.edit', $value['id']);
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

            $administrativos[$key] = array(
                $value['id'],
                $value['nombre'],
                $value['puesto'],
                $value['direccion'],
                $value['telefono'],
                $value['email'],
                $value['categoria'],
                $value['resenia'],
                $value['file'],

                $acciones,
            );
        }
        return $administrativos;
    }

    public function mostrarimg($id)
    {
        $administrativoEncontrado = Administrativo::find($id);

        $path = storage_path('app/public/administrativos_fotos/' . $administrativoEncontrado->file);
        $header = [
            'content-Type' => 'image/*',
            'content-Disposition' => 'inline; filename=' . $administrativoEncontrado . '"'
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
        return  view('administrativos.create');
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
            'puesto'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'categoria'=>'required',
            'resenia'=>'required',
            'file'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $administrativo = new Administrativo();
        $administrativo->nombre = $request->input('nombre');
        $administrativo->puesto = $request->input('puesto');
        $administrativo->direccion = $request->input('direccion');
        $administrativo->telefono = $request->input('telefono');
        $administrativo->email = $request->input('email');
        $administrativo->categoria = $request->input('categoria');
        $administrativo->resenia = $request->input('resenia');
        $administrativo->file = $request->file->getClientOriginalName();
        $administrativo->activo = 1;

        $administrativo->save();

        if($request->file){
            $nombreFotografia = $request->file->getClientOriginalName();
            $directorioArchivo = $request->file('file')->storeAs('public/administrativos_fotos', $nombreFotografia);
            $Administrativo_modelo = new Administrativo();
            $Administrativo_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
        }
        return redirect('administrativos');
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
        $administrativo = Administrativo::find($id);

        return view('administrativos.edit')->with('administrativo', $administrativo);
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
        $administrativo = Administrativo::find($id);
        $administrativo->nombre = $request->input('nombre');
        $administrativo->puesto = $request->input('puesto');
        $administrativo->direccion = $request->input('direccion');
        $administrativo->telefono = $request->input('telefono');
        $administrativo->email = $request->input('email');
        $administrativo->categoria = $request->input('categoria');
        $administrativo->resenia = $request->input('resenia');
        $administrativo->update();
        return redirect('administrativos');
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

    public function borrarAdministrativo($id){

        $administrativo = Administrativo::find($id);
        $administrativo->activo = 0;
        $administrativo->update();

        return redirect('administrativos');
    }
}
