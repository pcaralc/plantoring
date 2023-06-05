<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.formularioEmpresa');
    }

    public function empresa(Empresa $empresa)
    {
        return view('web.empresa', ['empresa' => $empresa]);
    }

    public function add()
    {
        return view('admin.formularioEmpresa',  ['gestores' => User::all()]);
    }

    /**
     * sacar todas las empresas para un gestor
     */
    public function empresasGestor()
    {
        return view('gestor.empresas', ['empresas' => Empresa::all()]);
    }

    /**
     * obtener la primera empresa
     */
    public function create()
    {
        $empresa = Empresa::first();
        return view('web.layout', ['empresa' => $empresa, 'terrenos' => $empresa->terrenos()->where('empresa_id', $empresa->id)->get()]);
    }

    /**
     * obtener la ultima empresa o segunda
     */
    public function ultimaEmpresa()
    {
        $empresa = Empresa::latest()->first();
        return view('web.layout', ['empresa' => $empresa, 'terrenos' => $empresa->terrenos()->where('empresa_id', $empresa->id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->flash();

        $empresa = new Empresa();
        $empresa->nombre = $request->input('nombre');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->ciudad = $request->input('ciudad');
        $empresa->telefono = $request->input('telefono');
        $empresa->email = $request->input('email');
        $empresa->latitud = $request->input('latitud');
        $empresa->longitud = $request->input('longitud');
        $empresa->gestor_id = $request->input('gestor');

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $empresa->imagen =  str_replace('public', 'storage', $path);

        $empresa->save();

        return redirect()->route('admin', ['empresas' => Empresa::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return view('admin.terrenos', ['empresa' => $empresa, 'terrenos' => $empresa->terrenos()->where('empresa_id', $empresa->id)->get()]);
    }

    /**
     * Visualizar los terrenos de la empresa en la vista del gestor
     */
    public function showGestor(Empresa $empresa)
    {
        return view('gestor.terrenos', ['empresa' => $empresa, 'terrenos' => $empresa->terrenos()->where('empresa_id', $empresa->id)->get()]);
    }

    /**
     * Informacion de la empresa en la vista admin
     */
    public function informacion(Empresa $empresa)
    {
        return view('admin.informacionEmpresa', ['empresa' => $empresa]);
    }

    /**
     * Informacion de la empresa en la vista gestor
     */
    public function informacionGestor(Empresa $empresa)
    {
        return view('gestor.informacionEmpresa', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('admin.modificarEmpresa', ['empresa' => $empresa, 'gestores' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->nombre = $request->input('nombre');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->ciudad = $request->input('ciudad');
        $empresa->telefono = $request->input('telefono');
        $empresa->email = $request->input('email');
        $empresa->latitud = $request->input('latitud');
        $empresa->longitud = $request->input('longitud');
        $empresa->gestor_id = $request->input('gestor');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            if ($imagen->isValid()) {
                $path = $request->file('imagen')->store('public');

                $empresa->imagen =  str_replace('public', 'storage', $path);
            } 
        }

        $empresa->save();

        return redirect()->route('admin', ['empresas' => Empresa::all()]);
    }



    /**
     * Editor gestor
     */
    public function editGestor(string $id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('gestor.modificarEmpresa', ['empresa' => $empresa, 'gestores' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGestor(Request $request, string $id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->nombre = $request->input('nombre');
        $empresa->descripcion = $request->input('descripcion');
        $empresa->ciudad = $request->input('ciudad');
        $empresa->telefono = $request->input('telefono');
        $empresa->email = $request->input('email');
        $empresa->latitud = $request->input('latitud');
        $empresa->longitud = $request->input('longitud');

        //Imagen
        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $empresa->imagen =  str_replace('public', 'storage', $path);

        $empresa->save();

        return redirect()->route('empresa', ['empresa' => $empresa->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('admin', ['empresas' => Empresa::all()]);
    }
}
