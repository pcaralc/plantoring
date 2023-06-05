@extends('gestor.index')

@section('barra')
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>ver</span></p>
    <a href="/gestor/empresa/{{ $empresa->id }}/terrenos"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
        </svg>
        Terrenos
    </a>

    <p class="border-t border-gray-200"></p>
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>Empresa</span></p>
    <a href="/gestor/editar/empresa/{{ $empresa->id }}"
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


@endsection

@section('contenido')
    <div class="p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <div class="container">

            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                <div>
                    <h5 class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                        {{ $empresa->nombre }}</h5>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Nombre: </strong>
                        {{ $empresa->nombre }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Descripción: </strong>
                        {{ $empresa->descripcion }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Ciudad: </strong>
                        {{ $empresa->ciudad }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Teléfono: </strong>
                        {{ $empresa->telefono }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Email: </strong>
                        {{ $empresa->email }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Latitud: </strong>
                        {{ $empresa->latitud }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Longitud: </strong>
                        {{ $empresa->longitud }}</p>




                </div>

                <div class='col rounded mt-8'>
                    <div class="grid grid-cols-2 md:grid-cols-2">
                        <div class="col rounded mt-3">
                            <div class="h-12 w-full">
                                <img class="rounded"
                                    src="{{ asset($empresa->imagen) }}"
                                    alt="imagen de la empresa" />
                            </div>

                        </div>

                    </div>



                </div>

            </div>
            <div class="mt-4">
                <iframe width="90%" height="150"
                    src="https://maps.google.com/maps?q={{ $empresa->latitud }},{{ $empresa->longitud }}&output=embed"
                    class="rounded"></iframe>
            </div>
        </div>
    </div>
@endsection
