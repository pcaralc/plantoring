@extends('gestor.index')

@section('barra')
    <a href="/gestor/terreno/add/{{ $empresa->id }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Añadir terreno
    </a>

    
    <p class="border-t border-gray-200"></p>
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>Plantaciones</span></p>
    
    <a href="/gestor/buscador"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        Buscador
    </a>
@endsection


@section('contenido')
    <h1 class="ml-14 uppercase text-2xl font-bold text-green-700 mb-6">Terrenos </h1>

    <div class="flex justify-center rounded">
        <div class="container">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
                @foreach ($terrenos as $terreno)
                    <div
                        class="max-w-sm  bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div >
                            <a href="/gestor/terreno/{{ $terreno->id }}">
                                <img class="rounded w-full h-48" src="{{ asset($terreno->imagen) }}" alt="" />
                            </a>
                        </div>
                        <div class="ml-2 mt-2">
                            <a href="/gestor/terreno/{{ $terreno->id }}">
                                <h5 class="mb-2 uppercase text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $terreno->nombre }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $terreno->descripcion }}</p>
                            <a href="/gestor/terreno/{{ $terreno->id }}"
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
