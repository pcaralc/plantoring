<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plantación') }}
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
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span
                                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Empresa</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>




                        <div
                            class="mt-6 mb-6 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <div class="container">

                                <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                                    <div>
                                        <h5
                                            class="mb-6 uppercase text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $empresa->nombre }}</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nombre:
                                            {{ $empresa->nombre }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Descripción:
                                            {{ $empresa->descripcion }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ciudad:
                                            {{ $empresa->ciudad }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Teléfono:
                                            {{ $empresa->telefono }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Email:
                                            {{ $empresa->email }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Latitud:
                                            {{ $empresa->latitud }}</p>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Longitud:
                                            {{ $empresa->longitud }}</p>




                                    </div>

                                    <div class='col rounded mt-6'>
                                        <a href="/admin/consultar/{{$empresa->id}}" class="flex justify-end px-4 py-2 text-sm font-medium text-center text-white underline   decoration-double">TERRENOS</a>
                                        <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
                                            <div class="col rounded mt-3">
                                                <div class="h-8">
                                                    <img class="rounded  border"
                                                        src="{{ asset($empresa->imagen) }}"
                                                        alt="" />
                                                </div>

                                            </div>

                                        </div>
                                        


                                    </div>

                                    <div class="mt-4">
                                        <iframe width="70%" height="250"
                                            src="https://maps.google.com/maps?q={{ $empresa->latitud }},{{ $empresa->longitud }}&output=embed"
                                            class="rounded"></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
