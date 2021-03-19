<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // obteniendo las recetas mas nuevas
        // $nuevas = Receta::orderBy('created_at','DESC')->get();
        $nuevas = Receta::latest()->take(5)->get();//esto es lo mismo que arriba

        return view('inicio.index',compact('nuevas'));
    }
}
