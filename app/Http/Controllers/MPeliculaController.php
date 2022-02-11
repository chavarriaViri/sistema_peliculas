<?php

namespace App\Http\Controllers;

use App\Models\m_pelicula;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MPeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosP['peliculas']=m_pelicula::paginate(5);
        return view('peliculas.index',$datosP);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacionCampos=[
            'Nombre' =>'required',
            'Poster' =>'required',
            'Duracion' =>'required',
            'Clasificacion' =>'required',
        ];

        $ms = ['required' => 'El :attribute es requerido'];

        $this->validate($request,$validacionCampos,$ms);

        $datosPelicula = request()->except('_token');

        if($request->hasFile('Poster')){
            $datosPelicula['Poster'] = $request->file('Poster')->store('uploads','public');
        }

        m_pelicula::insert($datosPelicula);
        //return response()-> json($datosPelicula);
        return redirect('peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\m_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(m_pelicula $m_pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\m_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula=m_pelicula::findOrFail($id);

        return view('peliculas.edit',compact('pelicula'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\m_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $datosPelicula = request()->except('_token','_method');

        if($request->hasFile('Poster')){
            $pelicula=m_pelicula::findOrFail($id);

            storage::delete('public/'.$pelicula->Poster);

            $datosPelicula['Poster'] = $request->file('Poster')->store('uploads','public');
        }

        m_pelicula::where('id','=',$id)->update($datosPelicula);

        $pelicula=m_pelicula::findOrFail($id);
        return view('peliculas.edit',compact('pelicula'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\m_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula=m_pelicula::findOrFail($id);

        if(Storage::delete('public/'.$pelicula->Poster)){
            m_pelicula::destroy($id);
        }
        return redirect ('peliculas');
    }
}
