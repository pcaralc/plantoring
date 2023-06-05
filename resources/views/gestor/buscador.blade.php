@extends('gestor.index')

@section('barra')
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>volver</span></p>

    <a href="/gestor/empresa/{{$empresa->id}}/terrenos" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
        </svg>
        Terrenos
    </a>
@endsection


@section('contenido')
    <div class="flex flex-wrap mb-8">
        <form class="ml-14 flex md:1/3" action="/gestor/buscar" method="POST">
            @csrf
            <div class="flex ">
                <select name="temporada" id="temporada" class="border border-green-400 rounded ">
                    <option value="" class="text-gray-800 bg-green-600" selected>Temporada</option>
                    <option value="springSummer">Primavera-Verano</option>
                    <option value="autumnWinter">Otoño-Invierno</option>
                </select>


                <select name="origen" id="origen" class="ml-2 border border-green-400 rounded ">
                    <option value="" class="text-gray-800 bg-green-600" selected>Origen</option>
                    <option value="local">Local</option>
                    <option value="extranjero">Extranjero</option>
                </select>

                <select name="especie" id="especie" class="ml-2 border border-green-400 rounded ">
                    <option value="" class="text-gray-800 bg-green-600" selected>Especie</option>
                    <option value="cereales">Cereales</option>
                    <option value="leguminosas">Leguminosas</option>
                    <option value="oleaginosas">Oleaginosas</option>
                    <option value="hortalizas">Hortalizas</option>
                    <option value="frutales">Frutales</option>
                    <option value="ornamentales">Ornamentales</option>
                    <option value="raicesTuberculos">Raices/Tuberculos</option>
                    <option value="medicinalesAromaticas">Medicinales/Aromaticas</option>
                    <option value="tropicales">Tropicales</option>
                    <option value="pastos">Pastos</option>
                </select>

                <div class=" w-full">
                    <button type="submit"
                        class=" top-0 right-0 p-2.5 text-sm font-medium text-white bg-green-700 rounded-r-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>


    <h1 class="ml-14 uppercase text-2xl font-bold text-green-700 mb-6">Plantaciones </h1>

    <div class="flex justify-center rounded">
        <div class="container">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
                @foreach ($plantas as $planta)
                    <div
                        class="max-w-sm  bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div>
                            <a href="/gestor/plantacion/{{ $planta->id }}">
                                <img class="rounded w-full h-48" src="{{ asset($planta->imagen) }}" alt="" />
                            </a>
                        </div>
                        <div class="ml-2 mt-2">
                            <a href="/gestor/plantacion/{{ $planta->id }}">
                                <h5 class="mb-2 uppercase text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $planta->nombre }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $planta->descripcion }}</p>
                            <a href="/gestor/terreno/{{ $planta->terreno->id }}">
                                <p class="mb-3 font-normal text-gray-700 text-lg dark:text-gray-400 hover:text-green-500"> 
                                    <strong>Terreno:</strong>
                                {{ $planta->terreno->nombre }}</p></a>
                            <a href="/gestor/plantacion/{{ $planta->id }}"
                                class="mb-2 inline-flex items-center px-3 py-2 text-sm text-center text-gray-900 border border-green-600 rounded-lg hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-600 dark:bg-green-600 dark:hover:bg-green-900 dark:focus:ring-green-900">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection
