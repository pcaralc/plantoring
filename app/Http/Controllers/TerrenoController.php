<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Terreno;
use Illuminate\Http\Request;

class TerrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Empresa $empresa, Terreno $terreno)
    {
        return view('web.terreno', ['empresa' => $empresa, 'terreno' => $terreno, 'plantas' => $terreno->plantas()->where('terreno_id', $terreno->id)->get()]);
    }

    public function add(Empresa $empresa)
    {
        return view('admin.formularioTerreno',  ['empresa' => $empresa]);
    }

    public function addGestor(Empresa $empresa)
    {
        return view('gestor.formularioTerreno',  ['empresa' => $empresa]);
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
    public function store(Empresa $empresa, Request $request)
    {
        $request->flash();

        $terreno = new Terreno();
        $terreno->nombre = $request->input('nombre');
        $terreno->descripcion = $request->input('descripcion');
        $terreno->ecologico = $request->input('ecologico');
        $terreno->latitud = $request->input('latitud');
        $terreno->longitud = $request->input('longitud');
        $terreno->empresa_id = $request->input('empresa');

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $terreno->imagen =  str_replace('public', 'storage', $path);

        $terreno->save();

        return redirect()->route('terrenos', ['empresa' => $empresa->id]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeGestor(Empresa $empresa, Request $request)
    {
        $request->flash();

        $terreno = new Terreno();
        $terreno->nombre = $request->input('nombre');
        $terreno->descripcion = $request->input('descripcion');
        $terreno->ecologico = $request->input('ecologico');
        $terreno->latitud = $request->input('latitud');
        $terreno->longitud = $request->input('longitud');
        $terreno->empresa_id = $request->input('empresa');

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $terreno->imagen =  str_replace('public', 'storage', $path);

        $terreno->save();

        return redirect()->route('terrenosGestor', ['empresa' => $empresa->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Terreno $terreno)
    {
        return view('admin.informacionTerreno', ['terreno' => $terreno, 'plantas' => $terreno->plantas()->where('terreno_id', $terreno->id)->get()]);
    }

    public function showGestor(Terreno $terreno)
    {
        // Api del tiempo, sacar la temperatura del terreno
        // echo "Current temperature in $location is {$api_result['current']['temperature']}℃", PHP_EOL;
//af58fe6729db73cd0dd5ad05e3bf5dda
        // $queryString = http_build_query([
        //     'access_key' => 'af58fe6729db73cd0dd5ad05e3bf5dda',
        //     'query' => $terreno->latitud,$terreno->longitud,
        // ]);

        // $ch = curl_init(sprintf('%s?%s', 'https://api.weatherstack.com/current?access_key=af58fe6729db73cd0dd5ad05e3bf5dda&query=',$terreno->latitud,$terreno->longitud));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $json = curl_exec($ch);
        // curl_close($ch);

        // $api_result = json_decode($json, true);
        // $temperature = $api_result['current']['temperature'];

        $uri = 'https://api.open-meteo.com/v1/forecast?latitude=37.409571&longitude=-1.864176&current_weather=true&hourly=temperature_2m';       

        $resultado = file_get_contents($uri, false);

        //Pasar de json a objeto php y recorrer los resultados
        if ($resultado != false) {
            $respPHP = json_decode($resultado);


                $terreno->temperatura = $respPHP->current_weather->temperature;

          
        }

        $empresa = Empresa::first();
        return view('gestor.informacionTerreno', ['empresa' => $empresa, 'terreno' => $terreno, 'plantas' => $terreno->plantas()->where('terreno_id', $terreno->id)->get()]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $terreno = Terreno::findOrFail($id);
        return view('admin.modificarTerreno', ['terreno' => $terreno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $terreno = Terreno::findOrFail($id);

        $terreno->nombre = $request->input('nombre');
        $terreno->descripcion = $request->input('descripcion');
        $terreno->ecologico = $request->input('ecologico');
        $terreno->latitud = $request->input('latitud');
        $terreno->longitud = $request->input('longitud');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            if ($imagen->isValid()) {
                $path = $request->file('imagen')->store('public');

                $terreno->imagen =  str_replace('public', 'storage', $path);
            }
        }

        $terreno->save();

        return redirect()->route('plantas', ['terreno' => $terreno->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editGestor(string $id)
    {
        $terreno = Terreno::findOrFail($id);
        $empresa = Empresa::first();
        return view('gestor.modificarTerreno', ['empresa' => $empresa, 'terreno' => $terreno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGestor(Request $request, string $id)
    {
        $terreno = Terreno::findOrFail($id);

        $terreno->nombre = $request->input('nombre');
        $terreno->descripcion = $request->input('descripcion');
        $terreno->ecologico = $request->input('ecologico');
        $terreno->latitud = $request->input('latitud');
        $terreno->longitud = $request->input('longitud');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            if ($imagen->isValid()) {
                $path = $request->file('imagen')->store('public');

                $terreno->imagen =  str_replace('public', 'storage', $path);
            }
        }


        $terreno->save();

        return redirect()->route('terreno', ['terreno' => $terreno->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terreno $terreno)
    {
        $terreno->delete();
        return redirect()->route('terrenos', ['empresa' => $terreno->empresa_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGestor(Terreno $terreno)
    {
        $terreno->delete();
        return redirect()->route('terrenosGestor', ['empresa' => $terreno->empresa_id]);
    }

    public function tiempo(Terreno $terreno)
    {

    }
}
