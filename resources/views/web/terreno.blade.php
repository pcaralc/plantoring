@extends('web.layout')

@section('contenido')
    <!--nav-->
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
            <li aria-current="page">
                <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400 ">Terreno</span>
                </div>
            </li>
        </ol>
    </nav>
    <!--/nav-->


    <div class="mt-10 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">

            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                <div>
                    <h5 class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                        {{ $terreno->nombre }}</h5>

                    <p class="ml-4 mb-3 text-lg font-normal text-gray-700 dark:text-gray-400"><strong> Nombre: </strong>
                        {{ $terreno->nombre }}</p>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Descripción:
                        </strong>
                        {{ $terreno->descripcion }}</p>


                    @if ($terreno->ecologico == 0)
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Ecologico:
                            </strong> No
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Ecologico:
                            </strong> Si
                        </p>
                    @endif

                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Latitud: </strong>
                        {{ $terreno->latitud }}</p>
                    <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong> Longitud: </strong>
                        {{ $terreno->longitud }}</p>
                </div>

                <div class='col rounded mt-8 '>
                    <iframe width="60%" height="250"
                        src="https://maps.google.com/maps?q={{ $terreno->latitud }},{{ $terreno->longitud }}&output=embed"
                        class="rounded border border-green-500"></iframe>
                </div>

            </div>

        </div>

    </div>

    <div>
        <div class="mt-20 uppercase text-green-700">
            <p class="font-semibold">Plantaciones</p>
        </div>

        <!--Posts Container-->
        <div class="flex flex-wrap justify-between pt-8 -mx-6 rounded">

            @foreach ($plantas as $planta)
                <div class="w-full md:w-1/3 p-6 " onmouseover="aumentarTarjeta(this)" onmouseout="restaurarTarjeta(this)">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <a href="/terreno/{{ $empresa->id }}/plantacion/{{ $planta->id }}"
                            class="flex flex-wrap no-underline hover:no-underline">
                            <img src="{{ asset($planta->imagen) }}"
                                class="h-64 w-full rounded-t pb-6">
                            <!--imagenes de los terrrenos-->
                            <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $planta->nombre }}
                            </div>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                {{ $planta->descripcion }}
                            </p>
                        </a>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-400 text-xs md:text-sm">Origen: {{ $planta->origen }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
