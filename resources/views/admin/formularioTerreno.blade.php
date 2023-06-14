<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir nuevo terreno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">

                        <x-form-add action='/admin/add/terreno/{{ $empresa->id }}' enctype='multipart/form-data'>

                            <x-input-add type='text' id="nombre" name='nombre' texto='Nombre: ' value=''
                                required />
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="descripcion" class="form-label">Descripción: </label>
                                        <textarea id="descripcion" name="descripcion" class="text-gray-900 rounded w-full" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <x-input-add type='file' id="imagen" name='imagen' texto='Imagen de la plantación: '
                                value='' required />
                            <x-input-add type='text' id="latitud" name='latitud' texto='Latitud: ' value=''
                                required />
                            <x-input-add type='text' id="longitud" name='longitud' texto='Longitud: ' value=''
                                required />


                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="ecologico" class="form-label">Ecologico: </label>
                                        <select name="ecologico" id="ecologico" class="rounded text-gray-900 w-full">
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
                                        <input type="text" id="" name=""
                                            value="{{ $empresa->nombre }}" class="text-gray-900 rounded w-full"
                                            disabled>
                                        <input type="hidden" name="empresa" id="empresa" value="{{ $empresa->id }}"
                                            class="text-gray-900 rounded">
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">

                                        <input type="submit" value="Añadir"
                                            class="border rounded p-2 bg-white text-gray-900">
                                    </div>
                                </div>
                            </div>




                        </x-form-add>


                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
