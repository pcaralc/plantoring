@extends('gestor.index')

@section('contenido')
    <h5 class="mb-6 uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
        Modificar Terreno</h5>
    <div class="mt-6 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">
            <form method='POST' action='/gestor/update/terreno/{{ $terreno->id }}' enctype='multipart/form-data'
                class='card m-2'>
                @csrf
                @method('put')

                <x-input-add-gestor type='text' id="nombre" name='nombre' texto='Nombre: '
                    value='{{ $terreno->nombre }}' placeholder="{{ $terreno->nombre }}" />
                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="descripcion" class="form-label">Descripción: </label>
                            <textarea id="descripcion" name="descripcion" class="pl-2 text-gray-900 rounded border border-gray-500 w-full"
                                placeholder="{{ $terreno->descripcion }}">{{ $terreno->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
                <x-input-add-gestor type='file' id="imagen" name='imagen' texto='Imagen del terreno: '
                    value='{{ $terreno->imagen }}' placeholder="{{ $terreno->imagen }}" />
                <x-input-add-gestor type='text' id="latitud" name='latitud' texto='Latitud: '
                    value='{{ $terreno->latitud }}' placeholder="{{ $terreno->latitud }}" />
                <x-input-add-gestor type='text' id="longitud" name='longitud' texto='Longitud: '
                    value='{{ $terreno->longitud }}' placeholder="{{ $terreno->longitud }}" />


                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="ecologico" class="form-label">Ecologico: </label>
                            <select name="ecologico" id="ecologico"
                                class="rounded text-gray-900 border border-black w-full">
                                <option value="{{ $terreno->ecologico }}"></option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">

                            <input type="submit" value="Modificar"
                                class="border border-green-600 rounded p-2 bg-green-700 text-white">
                        </div>
                    </div>
                </div>




            </form>

        </div>
    </div>
@endsection
