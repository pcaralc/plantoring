<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modificar plantación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">

                        <form method='POST' action='/admin/update/plantacion/{{ $planta->id }}'
                            enctype='multipart/form-data' class='card m-2'>
                            @csrf
                            @method('put')

                            <x-input-add type='text' id="nombre" name='nombre' texto='Nombre: '
                                value='{{ $planta->nombre }}' placeholder='{{ $planta->nombre }}' />
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="descripcion" class="form-label">Descripción: </label>
                                        <textarea id="descripcion" name="descripcion" class="pl-2 rounded text-gray-900 w-full"
                                            placeholder="{{ $planta->descripcion }}">{{ $planta->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <x-input-add type='file' id="imagen" name='imagen' texto='Imagen del terreno: '
                                value='{{ $planta->imagen }}' placeholder='{{ $planta->imagen }}' />

                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="temporada" class="form-label">Temporada: </label>
                                        <select name="temporada" id="temporada" class="rounded text-gray-900 w-full">
                                            <option value="{{ $planta->temporada }}" selected></option>
                                            <option value="springSummer" >Primavera-Verano</option>
                                            <option value="autumnWinter">Otoño-Invierno</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <x-input-add type='date' id="siembra" name='siembra' texto='Fecha aprox. de siembra: '
                                value='{{ $planta->siembra }}' placeholder='{{ $planta->siembra }}' />
                            <x-input-add type='date' id="cosecha" name='cosecha' texto='Fecha aprox. de cosecha: '
                                value='{{ $planta->cosecha }}' placeholder='{{ $planta->cosecha }}' />
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="origen" class="form-label">Origen: </label>
                                        <select name="origen" id="origen" class="rounded text-gray-900 w-full">
                                            <option value="{{ $planta->origen }}" selected>{{ $planta->origen }}
                                            </option>
                                            <option value="local">Local</option>
                                            <option value="extranjero">Extranjero</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="especie" class="form-label">Especie: </label>
                                        <select name="especie" id="especie" class="rounded text-gray-900 w-full">
                                            <option value="{{ $planta->especie }}" selected>{{ $planta->especie }}
                                            </option>
                                            <option value="cereales">Cereales</option>
                                            <option value="leguminosas">Leguminosas</option>
                                            <option value="oleaginosas">Oleaginosas</option>
                                            <option value="hortalizas">Hortalizas</option>
                                            <option value="frutales">Frutales</option>
                                            <option value="ornamentales">Ornamentales</option>
                                            <option value="raicesTuberculos">Raices/Tuberculos</option>
                                            <option value="medicinalesAromaticas">Medicinales/Aromáticas</option>
                                            <option value="tropicales">Tropicales</option>
                                            <option value="pastos">Pastos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <x-input-add type='number' id="temp_min" name='temp_min' texto='Temperatura mínima: '
                                value='{{ $planta->temp_min }}' placeholder='{{ $planta->temp_min }}' />
                            <x-input-add type='number' id="temp_max" name='temp_max' texto='Temperatura máxima: '
                                value='{{ $planta->temp_max }}' placeholder='{{ $planta->temp_max }}' />

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
