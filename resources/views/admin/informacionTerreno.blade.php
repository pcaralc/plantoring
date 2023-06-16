<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Terreno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">


                        <div>
                            <!-- Breadcrumb -->
                            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                                aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    <li class="inline-flex items-center">
                                        <a href="/admin"
                                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                            Panel
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <a href="/admin/consultar/{{ $terreno->empresa_id }}"
                                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Terrenos</a>
                                        </div>
                                    </li>
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span
                                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Plantaciones</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>




                        <div
                            class="mt-6 mb-6  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="container">

                                <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                                    <div>
                                        <h5
                                            class="mb-6 uppercase text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $terreno->nombre }}</h5>

                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Nombre:</strong>
                                            {{ $terreno->nombre }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Descripción:</strong>
                                            {{ $terreno->descripcion }}</p>


                                        @if ($terreno->ecologico == 0)
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Ecologico:</strong> No
                                            </p>
                                        @else
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Ecologico:</strong> Si
                                            </p>
                                        @endif

                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Latitud:</strong>
                                            {{ $terreno->latitud }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong class="text-green-600">Longitud:</strong>
                                            {{ $terreno->longitud }}</p>

                                        <div class="flex mt-4 space-x-3 md:mt-6 mb-4">
                                            <a href="/admin/editar/terreno/{{ $terreno->id }}"
                                                class=" ml-2 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Editar</a>

                                            <a href="/admin/delete/terreno/{{ $terreno->id }}"
                                                class=" ml-2 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                </svg></a>
                                        </div>
                                    </div>

                                    <div class='col rounded mt-3'>
                                        <iframe width="60%" height="250"
                                            src="https://maps.google.com/maps?q={{ $terreno->latitud }},{{ $terreno->longitud }}&output=embed"
                                            class="rounded"></iframe>
                                    </div>

                                </div>

                            </div>

                        </div>




                        <div
                            class=" mt-6 mb-6 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h1 class="uppercase text-lg underline mt-3">Plantaciones </h1>
                                <p class="px-4 py-4"><a href="/admin/plantacion/add/{{ $terreno->id }}" type="button"
                                        class="btn btn-outline-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </a></p>
                            </div>

                            <div class="container">
                                <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                                    @foreach ($plantas as $planta)
                                        <div
                                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <a href="/admin/plantacion/{{ $planta->id }}">
                                                <img class="rounded w-full " style="height:350px;"
                                                    src="{{ asset($planta->imagen) }}"
                                                    alt="" />
                                            </a>
                                            <div class="ml-2 mt-2">
                                                <a href="/admin/plantacion/{{ $planta->id }}">
                                                    <h5
                                                        class="mb-2 uppercase text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                        {{ $planta->nombre }}</h5>
                                                </a>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                    {{ $planta->descripcion }}</p>
                                                <a href="/admin/plantacion/{{ $planta->id }}"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Read more
                                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1"
                                                        fill="currentColor" viewBox="0 0 20 20"
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
                    </div>

                </div>


            </div>




        </div>


    </div>



</x-app-layout>
