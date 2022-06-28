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
        // $el_mas_descargado =  Vista_vs_Descarga::select(DB::raw('count(*) as suma') )
        // ->groupBy('visitas')->get();
        // dd($el_mas_descargado);
        return view('admindash');
    }
}
