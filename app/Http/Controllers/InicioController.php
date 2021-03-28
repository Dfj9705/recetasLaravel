<?php

namespace App\Http\Controllers;

use App\CategoriaReceta;
use App\Policies\RecetaPolicy;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    public function index()
    {
        // obteniendo las recetas mas nuevas
        // $nuevas = Receta::orderBy('created_at','DESC')->get();
        $nuevas = Receta::latest()->take(5)->get();//esto es lo mismo que arriba


        //obtener categorias

        $categorias = CategoriaReceta::all();

        

        $recetas = [];

        foreach ($categorias as $categoria) {
            $recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id )->get();
        }
        // return $recetas;

        return view('inicio.index',compact('nuevas'));
    }
}
