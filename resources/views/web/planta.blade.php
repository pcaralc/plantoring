@extends('web.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <nav class=" mt-20 flex px-5 py-3 text-gray-700 border border-green-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="/terreno/{{$empresa->id}}/{{$planta->terreno_id}}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Terreno</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Plantacion</span>
                </div>
            </li>
        </ol>
    </nav>

    <!--Planta-->

    <div class="mt-6 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">

            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                <div>
                    <h5 class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                        {{ $planta->nombre }}</h5>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Nombre: </strong>
                        {{ $planta->nombre }}</p>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Descripción:
                        </strong>
                        {{ $planta->descripcion }}</p>

                    @if ($planta->temporada == 'springSummer')
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Temporada:
                            </strong>
                            Primavera-Verano
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Temporada:
                            </strong>
                            Otoño-Invierno
                        </p>
                    @endif

                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Siembra: </strong>
                        {{ $planta->siembra }}</p>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Cosecha: </strong>
                        {{ $planta->cosecha }}</p>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Origen: </strong>
                        {{ $planta->origen }}</p>

                    @if ($planta->especie == 'raicesTuberculos')
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Especie:
                            </strong>
                            raices/tuberculos
                        </p>
                    @elseif($planta->especie == 'medicinalesAromaticas')
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Especie:
                            </strong>
                            medicinales/aromáticas
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Especie:
                            </strong>
                            {{ $planta->especie }}
                        </p>
                    @endif


                </div>

                <div class='col rounded mt-3'>
                    <img class="rounded  w-96  mt-8 border border-green-500"
                        src="{{ asset($planta->imagen) }}" alt="" />
                </div>


            </div>

        </div>

    </div>
@endsection
