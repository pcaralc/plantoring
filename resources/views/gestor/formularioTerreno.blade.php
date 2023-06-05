@extends('gestor.index')

@section('contenido')
    <h5 class="mb-6 uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
        Añadir Terreno</h5>
    <div class="mt-6 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">
            <x-form-add action='/gestor/add/terreno/{{ $empresa->id }}' enctype='multipart/form-data'>

                <x-input-add-gestor type='text' id="nombre" name='nombre' texto='Nombre: ' value='' required />
                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="descripcion" class="form-label">Descripción: </label>
                            <textarea id="descripcion" name="descripcion" class="text-gray-900 rounded border border-gray-500 w-full" required></textarea>
                        </div>
                    </div>
                </div>
                <x-input-add-gestor type='file' id="imagen" name='imagen' texto='Imagen del terreno: ' value=''
                    required />
                <x-input-add-gestor type='text' id="latitud" name='latitud' texto='Latitud: ' value=''
                    required />
                <x-input-add-gestor type='text' id="longitud" name='longitud' texto='Longitud: ' value=''
                    required />
                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="ecologico" class="form-label">Ecologico: </label>
                            <select name="ecologico" id="ecologico"
                                class="rounded text-gray-900 border border-gray-500 w-full">
                                <option value="1" selected>Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="empresa" class="form-label">Empresa: </label>
                            <input type="text" id="" name="" value="{{ $empresa->nombre }}"
                                class="text-gray-900 rounded border border-gray-500 w-full" disabled>
                            <input type="hidden" name="empresa" id="empresa" value="{{ $empresa->id }}"
                                class="text-gray-900 rounded">
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">

                            <input type="submit" value="Añadir"
                                class="border border-green-600 rounded p-2 bg-green-700 text-white">
                        </div>
                    </div>
                </div>




            </x-form-add>

        </div>
    </div>
@endsection
