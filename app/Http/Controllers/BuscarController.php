<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use App\Models\Revista;
use App\Models\Noticia;
use App\Models\Coleccion;
use Illuminate\Http\Request;


class BuscarController extends Controller
{
    public function search(Request $request){
        $validateDate = $this->validate($request,[
            'search'=>'required'
        ]);

        $busqueda = $request->input('search');
        if(isset($busqueda) && !is_null($busqueda)) {

            $categoria = 'libros';
            $libros = Libro::where('activo', '=', '1')
                ->where('id', '=', $busqueda)
                ->orWhere('nombre', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('autores', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('anio', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')->get();

            $libros = $this->cargaDT($libros,$categoria);

            $categoria = 'noticias';
            $noticias = Noticia::where('activo', '=', '1')
                ->where('id', '=', $busqueda)
                ->orWhere('titulo', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('fecha', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')->get();

            $noticias = $this->cargaDT($noticias,$categoria);

            $categoria = 'revistas';
            $revistas = Revista::where('activo', '=', '1')
                ->where('id', '=', $busqueda)
                ->orWhere('nombre', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('edicion', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('ensayo', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('autores', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
                ->get();
            $revistas = $this->cargaDT($revistas,$categoria);

            $categoria = 'coleccion';
            $coleccion = Coleccion::where('activo', '=', '1')
                ->where('id', '=', $busqueda)
                ->orWhere('titulo', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('coordinadores', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('tema', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('coleccion', 'LIKE', '%' . $busqueda . '%')
                ->orWhere('categoria', 'LIKE', '%' . $busqueda . '%')
                ->get();

            $funcion = '<script>
                        function mostrarImg(params){

                    console.log("Prueba");
                    console.log(params);
                    nuevaImagen = "/editorial/storage/app/public/noticias_img/" . (params["file"]);
                    console.log(nuevaImagen);
                    $("#NoticiaImg").attr("src", nuevaImagen);
                }
                </script>';
            $coleccion = $this->cargaDT($coleccion,$categoria);

            //$data = array_merge($libros,$revistas,$noticias);



            return view('buscador.buscador')
                ->with('libros', $libros)
                ->with('noticias', $noticias)
                ->with('revistas', $revistas)
                ->with('colecciones', $coleccion)
                ;
            //return view('buscador.buscador')->with('resultados', $data);
        }else{
            return redirect('home')->with(array(
                'message'=>'Debe de introducir un termino de consulta'
            ));
        }
    }


    public function cargaDT($consulta,$categoria)
    {
        $data = [];

        foreach ($consulta as $key => $value){

            //----------Mostrar Libro----------//

            $mostrarLibro = route('mostrarLibro', $value['id']);

            $accionesLibro = '

                <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="'.$mostrarLibro.'" role="button" class="btn btn-info" title="Mostrar Libro">Mostrar Libro
                            <i class="fa fa-file-pdf-o"></i>
                        </a>
                    </div>
                </div>

            ';

            if($categoria == 'libros') {
                $data[$key] = array(

                    //$value['id'],
                    $value['nombre'],
                    $value['autores'],
                    $value['anio'],
                    $value['descripcion'],

                    $accionesLibro,

                );
            }

            //--------Mostrar Noticia-------//

            // $mostrarNoticia = route('mostrarNoticia', $value['id']);

            // $path = storage_path('app/public/noticias_pdfs/' . $mostrarNoticia->file);
            // $header = [
            //     'Content-Type' => 'application/pdf',
            //     'Content-Disposition' => 'inline; filename="' . $mostrarNoticia->file . '"'
            // ];

            $imgN =  $value['file'];
            $accionesNoticia = '
            <div class="btn-acciones">
                <div class="btn-circle">
                   <a role="button" data-bs-toggle="modal" data-bs-target="#NoticiaModal"
                   onClick="mostrarImg('.$imgN.')"> Mostrar Noticia </a>
                </div>
            </div>
            ';



            if($categoria == 'noticias') {

                $data[$key] = array(

                    //$value['id'],
                    $value['titulo'],
                    $value['fecha'],
                    $value['descripcion'],
                    $accionesNoticia,
                );
            }

            //---------Mostrar Revista---------//

            $mostrarRevista = route('mostrarRevista', $value['id']);
            $accionesRevista = '

                <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="'.$mostrarRevista.'" role="button" class="btn btn-info" title="Mostrar Revista">Mostrar Revista
                            <i class="fa fa-file-pdf-o"></i>
                        </a>
                    </div>
                </div>

            ';

            if($categoria == 'revistas') {
                $data[$key] = array(

                    //$value['id'],
                    $value['nombre'],
                    $value['anio'],
                    $value['edicion'],
                    $value['ensayo'],
                    $value['autores'],
                    $value['descripcion'],
                    $accionesRevista,

                );
            }

            //-----------Mostrar Colecciones / Novedades--------------//

            $mostrarColeccion = route('mostrarColeccion', $value['id']);
            $accionesColeccion = '

                <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="'.$mostrarColeccion.'" role="button" class="btn btn-info" title="Mostrar Coleccion">Mostrar Coleccion
                            <i class="fa fa-file-pdf-o"></i>
                        </a>
                    </div>
                </div>

            ';

            if($categoria == 'coleccion') {
                $data[$key] = array(

                    //$value['id'],
                    $value['titulo'],
                    $value['coordinadores'],
                    $value['descripcion'],
                    $value['tema'],
                    $value['coleccion'],
                    $value['categoria'],
                    $accionesColeccion,
                );
            }
        }

        //$data = array_merge($libros,$revistas,$noticias);
        //dd($vsTable);


        return $data;
    }
}
