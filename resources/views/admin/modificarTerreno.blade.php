<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modificar terreno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">

                        <form method='POST' action='/admin/update/terreno/{{ $terreno->id }}'
                            enctype='multipart/form-data' class='card m-2'>
                            @csrf
                            @method('put')

                            <x-input-add type='text' id="nombre" name='nombre' texto='Nombre: '
                                value='{{ $terreno->nombre }}' placeholder="{{ $terreno->nombre }}" />
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="descripcion" class="form-label">Descripción: </label>
                                        <textarea id="descripcion" name="descripcion" class="rounded text-gray-900 w-full" placeholder="{{ $terreno->descripcion }}">{{ $terreno->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <x-input-add type='file' id="imagen" name='imagen' texto='Imagen del terreno: '
                                value='{{ $terreno->imagen }}' placeholder="{{ $terreno->imagen }}" />
                            <x-input-add type='text' id="latitud" name='latitud' texto='Latitud: '
                                value='{{ $terreno->latitud }}' placeholder="{{ $terreno->latitud }}" />
                            <x-input-add type='text' id="longitud" name='longitud' texto='Longitud: '
                                value='{{ $terreno->longitud }}' placeholder="{{ $terreno->longitud }}" />


                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="ecologico" class="form-label">Ecologico: </label>
                                        <select name="ecologico" id="ecologico" class="rounded text-gray-900 w-full">
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
                                            class="border rounded p-2 bg-white text-gray-900">
                                    </div>
                                </div>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
