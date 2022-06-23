<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::where('activo','=',1)->get();
        $tarticulo = $this->cargaDT($articulos);
        return view('articulos.index')->with('articulos',$tarticulo);
    }

    public function  cargaDT($consulta)
    {
        $articulos = [];

        foreach ($consulta as $key => $value){
            $eliminar = route('borrarArticulo', $value['id']);
            $edit = route('articulos.edit', $value['id']);
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

            $articulos[$key] = array(
                $value['id'],
                $value['titulo'],
                $value['descripcion'],
                $value['etiquetas'],
                $value['categoria'],
                $value['file'],

                $acciones,
            );
        }
        return $articulos;
    }

    public function mostrarimg($id)
    {
        $articuloEncontrado = Articulo::find($id);

        $path = storage_path('app/public/articulos_img/' . $articuloEncontrado->file);
        $header = [
            'content-Type' => 'image/*',
            'content-Disposition' => 'inline; filename=' . $articuloEncontrado . '"'
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
        return view('articulos.create');
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
            'descripcion'=>'required',
            'etiquetas'=>'required',
            'categoria'=>'required',
            'file'=>'required|image|mimes:jpg,jpeg,gif,png,svg',
        ]);

        $articulo = new Articulo();
        $articulo->titulo = $request->input('titulo');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->etiquetas = $request->input('etiquetas');
        $articulo->categoria = $request->input('categoria');
        $articulo->file = $request->file->getClientOriginalName();
        $articulo->activo = 1;

        $articulo->save();

        if($request->file){
            $nombreArticulo = $request->file->getClientOriginalName();
            $directorioArchivo = $request->file('file')->storeAs('public/articulos_img', $nombreArticulo);
            $Articulo_modelo = new Articulo();
            $Articulo_modelo->file_path = '/storage/app/public/' . $directorioArchivo;
        }
        return redirect('articulos');
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
        $articulo = Articulo::find($id);

        return view('articulos.edit')->with('articulo', $articulo);
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
        $articulo = Articulo::find($id);
        $articulo->titulo = $request->input('titulo');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->etiquetas = $request->input('etiquetas');
        $articulo->categoria = $request->input('categoria');
        $articulo->update();
        return redirect('articulos');    }

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

    public function borrarArticulo($id){

        $articulo = Articulo::find($id);
        $articulo->activo = 0;
        $articulo->update();

        return redirect('articulos');
    }
}
