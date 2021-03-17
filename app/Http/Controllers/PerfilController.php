<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth', ['except' => 'show' ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //ejecutar policy
        $this->authorize('view', $perfil);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //ejecutar policy
        $this->authorize('update', $perfil);

        //validar
        $data = request()->validate([
            'nombre' => 'required',
            'url'=> 'required',
            'biografia' => 'required'
        ]);

        if( $request['imagen'] ){
            $ruta_imagen = $request['imagen']->store('upload-perfiles','public');

            //resize de la img
            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600,600);
            $img->save();

            $array_imagen = ['imagen' => $ruta_imagen];
        }

        //actualizacion de la tabla users
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->update();

        //se eliminan variables del arreglo data
        unset($data['url']);
        unset($data['nombre']);


        //actualizacion de la tabla perfil
        auth()->user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? []

        ));


        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
