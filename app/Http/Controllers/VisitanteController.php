<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Vista_vs_Descarga;
use App\Models\Coleccion;
use App\Models\Libro;
use App\Models\Revista;
use App\Models\Noticia;

class VisitanteController extends Controller
{
        //LEER DOCUMENTOS
    function LeerNovedad($novedad_id, $nombre_archivo)
    {
        // dd($novedad_id);
        $conteoVistaNovedad = new Vista_vs_Descarga();
        $conteoVistaNovedad->id_registro = $novedad_id;
        $conteoVistaNovedad->id_seccion = 1;
        $conteoVistaNovedad->nombre_archivo = $nombre_archivo;
        $conteoVistaNovedad->visitas = 1;
        $conteoVistaNovedad->descargas = 0;
        $conteoVistaNovedad->save();


        $path = storage_path('app/public/colecciones_pdfs/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $nombre_archivo . '"'
        ];
        return response()->file($path, $header);
    }

    function LeerLibro($libro_id, $nombre_archivo)
    {
        $conteoVistaLibro = new Vista_vs_Descarga();
        $conteoVistaLibro->id_registro = $libro_id;
        $conteoVistaLibro->id_seccion = 2;
        $conteoVistaLibro->nombre_archivo = $nombre_archivo;
        $conteoVistaLibro->visitas = 1;
        $conteoVistaLibro->descargas = 0;
        $conteoVistaLibro->save();

        $path = storage_path('app/public/libros_pdfs/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $nombre_archivo . '"'
        ];
        return response()->file($path, $header);
    }

    function LeerRevista($revista_id, $nombre_archivo)
    {
        $conteoVistaRevista = new Vista_vs_Descarga();
        $conteoVistaRevista->id_registro = $revista_id;
        $conteoVistaRevista->id_seccion = 3;
        $conteoVistaRevista->nombre_archivo = $nombre_archivo;
        $conteoVistaRevista->visitas = 1;
        $conteoVistaRevista->descargas = 0;
        $conteoVistaRevista->save();

        $path = storage_path('app/public/revistas_pdfs/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $nombre_archivo . '"'
        ];
        return response()->file($path, $header);
    }

    function LeerNoticia($noticia_id, $nombre_archivo)
    {
        $conteoVistaNoticia = new Vista_vs_Descarga();
        $conteoVistaNoticia->id_registro = $noticia_id;
        $conteoVistaNoticia->id_seccion = 4;
        $conteoVistaNoticia->nombre_archivo = $nombre_archivo;
        $conteoVistaNoticia->visitas = 1;
        $conteoVistaNoticia->descargas = 0;
        $conteoVistaNoticia->save();

        $path = storage_path('app/public/noticias_img/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/img',
            'Content-Disposition' => 'inline; filename="' . $nombre_archivo . '"'
        ];
        return response()->file($path, $header);
    }

    //DESCARGAR DOCUMENTO
    function DescargarNovedad($novedad_id, $nombre_archivo)
    {
        // dd($novedad_id);
        $conteoDescargaNovedad = new Vista_vs_Descarga();
        $conteoDescargaNovedad->id_registro = $novedad_id;
        $conteoDescargaNovedad->id_seccion = 1;
        $conteoDescargaNovedad->nombre_archivo = $nombre_archivo;
        $conteoDescargaNovedad->visitas = 0;
        $conteoDescargaNovedad->descargas = 1;
        $conteoDescargaNovedad->save();

        $path = storage_path('app/public/colecciones_pdfs/' . $nombre_archivo);

        $header = [
              'Content-Type' => 'application/pdf'
           ];
        return response()->download($path, '', $header);
    }

    function DescargarLibro($libro_id, $nombre_archivo)
    {
        $conteoDescargaLibro = new Vista_vs_Descarga();
        $conteoDescargaLibro->id_registro = $libro_id;
        $conteoDescargaLibro->id_seccion = 2;
        $conteoDescargaLibro->nombre_archivo = $nombre_archivo;
        $conteoDescargaLibro->visitas = 0;
        $conteoDescargaLibro->descargas = 1;
        $conteoDescargaLibro->save();

        $path = storage_path('app/public/libros_pdfs/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($path, '',$header);
    }

    function DescargarRevista($revista_id, $nombre_archivo)
    {
        $conteoDescargaRevista = new Vista_vs_Descarga();
        $conteoDescargaRevista->id_registro = $revista_id;
        $conteoDescargaRevista->id_seccion = 3;
        $conteoDescargaRevista->nombre_archivo = $nombre_archivo;
        $conteoDescargaRevista->visitas = 0;
        $conteoDescargaRevista->descargas = 1;
        $conteoDescargaRevista->save();

        $path = storage_path('app/public/revistas_pdfs/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/pdf',
        ];
        return response()->download($path, '',$header);
    }

    function DescargarNoticia($noticia_id, $nombre_archivo)
    {
        $conteoDescargaNoticia = new Vista_vs_Descarga();
        $conteoDescargaNoticia->id_registro = $noticia_id;
        $conteoDescargaNoticia->id_seccion = 4;
        $conteoDescargaNoticia->nombre_archivo = $nombre_archivo;
        $conteoDescargaNoticia->visitas = 0;
        $conteoDescargaNoticia->descargas = 1;
        $conteoDescargaNoticia->save();

        $path = storage_path('app/public/noticias_img/' . $nombre_archivo);
        $header = [
            'Content-Type' => 'application/img',
        ];
        return response()->download($path, '',$header);
    }
}
