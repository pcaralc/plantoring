<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Planta;
use App\Models\Terreno;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Empresa $empresa, Planta $planta)
    {
        return view('web.planta', ['empresa' => $empresa, 'terreno' => $planta->terreno_id, 'planta' => $planta]);
    }

    public function add(Terreno $terreno)
    {
        return view('admin.formularioPlantacion',  ['terreno' => $terreno]);
    }

    public function addGestor(Terreno $terreno)
    {
        $empresa = Empresa::first();
        return view('gestor.formularioPlantacion',  ['empresa'=>$empresa,'terreno' => $terreno]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Terreno $terreno, Request $request)
    {
        $request->flash();

        $planta = new Planta();
        $planta->nombre = $request->input('nombre');
        $planta->descripcion = $request->input('descripcion');
        $planta->temporada = $request->input('temporada');
        $planta->siembra = $request->input('siembra');
        $planta->cosecha = $request->input('cosecha');
        $planta->origen = $request->input('origen');
        $planta->especie = $request->input('especie');
        $planta->temp_min = $request->input('temp_min');
        $planta->temp_max = $request->input('temp_max');
        $planta->terreno_id = $terreno->id;

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $planta->imagen =  str_replace('public', 'storage', $path);


        $planta->save();

        return redirect()->route('plantas', ['terreno' => $terreno->id]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeGestor(Terreno $terreno, Request $request)
    {
        $request->flash();

        $planta = new Planta();
        $planta->nombre = $request->input('nombre');
        $planta->descripcion = $request->input('descripcion');
        $planta->temporada = $request->input('temporada');
        $planta->siembra = $request->input('siembra');
        $planta->cosecha = $request->input('cosecha');
        $planta->origen = $request->input('origen');
        $planta->especie = $request->input('especie');
        $planta->temp_min = $request->input('temp_min');
        $planta->temp_max = $request->input('temp_max');
        $planta->terreno_id = $terreno->id;

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $planta->imagen =  str_replace('public', 'storage', $path);


        $planta->save();

        return redirect()->route('terreno', ['terreno' => $terreno->id]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Planta $planta)
    {
        return view('admin.informacionPlanta', ['planta' => $planta, 'terreno' => $planta->terreno]);
    }

    public function showGestor(Planta $planta)
    {
        $empresa = Empresa::first();
        return view('gestor.informacionPlanta', ['empresa'=>$empresa,'planta' => $planta, 'terreno' => $planta->terreno]);
    }

    public function buscador(){
        $empresa = Empresa::first();
        return view('gestor.buscador', ['empresa'=>$empresa,'plantas'=>Planta::all()]);
    }

    public function buscar(Request $request){
        
        $temporada = $request->input('temporada');
        $origen = $request->input('origen');
        $especie = $request->input('especie');

        $query = Planta::query();

        if ($temporada) {
            $query->where('temporada', $temporada);
        }
    
        if ($origen) {
            $query->where('origen', $origen);
        }
    
        if ($especie) {
            $query->where('especie', $especie);
        }

        $plantas = $query->get();

        $empresa = Empresa::first();

        return view('gestor.buscador', compact('plantas','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $planta = Planta::findOrFail($id);
        return view('admin.modificarPlantacion', ['planta' => $planta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $planta = Planta::findOrFail($id);

        $planta->nombre = $request->input('nombre');
        $planta->descripcion = $request->input('descripcion');
        $planta->temporada = $request->input('temporada');
        $planta->siembra = $request->input('siembra');
        $planta->cosecha = $request->input('cosecha');
        $planta->origen = $request->input('origen');
        $planta->especie = $request->input('especie');
        $planta->temp_min = $request->input('temp_min');
        $planta->temp_max = $request->input('temp_max');
        $planta->terreno_id = $planta->terreno_id;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            if ($imagen->isValid()) {
                $path = $request->file('imagen')->store('public');

                $planta->imagen =  str_replace('public', 'storage', $path);
            } 
        }

        $planta->save();

        return redirect()->route('planta', ['planta' => $planta->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editGestor(string $id)
    {
        $planta = Planta::findOrFail($id);
        $empresa = Empresa::first();
        return view('gestor.modificarPlantacion', ['empresa'=>$empresa,'planta' => $planta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGestor(Request $request, string $id)
    {
        $planta = Planta::findOrFail($id);

        $planta->nombre = $request->input('nombre');
        $planta->descripcion = $request->input('descripcion');
        $planta->temporada = $request->input('temporada');
        $planta->siembra = $request->input('siembra');
        $planta->cosecha = $request->input('cosecha');
        $planta->origen = $request->input('origen');
        $planta->especie = $request->input('especie');
        $planta->temp_min = $request->input('temp_min');
        $planta->temp_max = $request->input('temp_max');
        $planta->terreno_id = $planta->terreno_id;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            if ($imagen->isValid()) {
                $path = $request->file('imagen')->store('public');

                $planta->imagen =  str_replace('public', 'storage', $path);
            } 
        }

        $planta->save();

        return redirect()->route('plantacion', ['planta' => $planta->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planta $planta)
    {
        $planta->delete();
        return redirect()->route('plantas', ['terreno' => $planta->terreno_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGestor(Planta $planta)
    {
        $planta->delete();
        return redirect()->route('terreno', ['terreno' => $planta->terreno_id]);
    }
}
