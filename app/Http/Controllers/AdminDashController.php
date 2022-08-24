<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vista_vs_Descarga;


class AdminDashController extends Controller
{
    public function index()
    {
        $visitasTotales =  Vista_vs_Descarga::selectRaw('count(*) as TOTAL , id_seccion,id_registro,nombre_archivo')->where('visitas',1)->groupBy('nombre_archivo')->orderBy('TOTAL','desc')->limit(5)->get();
        $tvisitas = $this->cargaDT($visitasTotales);

            // dd($visitasTotales);
        // dd($visitasTotales);


        return view('adminDash')->with('tvisitas',$tvisitas);
    }

    public function cargaDT($consulta)
    {
        $topVistas=[];
        foreach ($consulta as $key =>$value){

            $seccion = '';
            if($value['id_seccion']==1){
                $seccion='Novedad';
            }

            if($value['id_seccion']==2){
                $seccion='Libro';
            }

            if($value['id_seccion']==3){
                $seccion='Revista';
            }

            if($value['id_seccion']==4){
                $seccion='Noticia';
            }


            $topVistas[$key] = array(
                // $value['id_registro'],
                $seccion,
                $value['nombre_archivo'],
                $value['TOTAL'],
            );
        }
        return $topVistas;
    }
}
