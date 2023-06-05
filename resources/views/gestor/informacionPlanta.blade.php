@extends('gestor.index')

@section('barra')
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>volver</span></p>

    <a href="/gestor/terreno/{{ $terreno->id }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
        </svg>
        Plantaciones
    </a>
    <p class="border-t border-gray-200"></p>
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>Plantación</span></p>

    <a href="/gestor/editar/plantacion/{{ $planta->id }}"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd"
                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
        </svg>
        Editar
    </a>

    <a href="/gestor/delete/plantacion/{{ $planta->id }}"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
        </svg>
        Eliminar
    </a>
@endsection

@section('contenido')
    <div class="p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="container">

            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                <div>
                    <h5 class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                        {{ $planta->nombre }}</h5>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Nombre: </strong>
                        {{ $planta->nombre }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Descripción: </strong>
                        {{ $planta->descripcion }}</p>

                    @if ($planta->temporada == 'springSummer')
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Temporada: </strong>
                            Primavera-Verano
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Temporada: </strong>
                            Otoño-Invierno
                        </p>
                    @endif

                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Siembra: </strong>
                        {{ $planta->siembra }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Cosecha: </strong>
                        {{ $planta->cosecha }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Origen: </strong>
                        {{ $planta->origen }}</p>

                    @if ($planta->especie == 'raicesTuberculos')
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Especie: </strong>
                            raices/tuberculos
                        </p>
                    @elseif($planta->especie == 'medicinalesAromaticas')
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Especie: </strong>
                            medicinales/aromáticas
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Especie: </strong>
                            {{ $planta->especie }}
                        </p>
                    @endif

                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Temperatura mínima: </strong>
                        {{ $planta->temp_min }} &#8451</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Temperatura máxima: </strong>
                        {{ $planta->temp_max }}&#8451</p>


                </div>

                <div class='col rounded mt-3'>
                    <img class="rounded  w-96  mt-8 border border-green-500" src="{{ asset($planta->imagen) }}"
                        alt="" />
                </div>

            </div>
        </div>
    </div>
@endsection
