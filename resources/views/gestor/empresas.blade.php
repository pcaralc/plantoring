@extends('gestor.index')

@section('contenido')
    @foreach ($empresas as $empresa)
        @if ($empresa->gestor_id == Auth::user()->id)
            <div class="container">
                <div class="grid justify-items-center grid-cols-4 gap-4 md:grid-cols-2">
                    <div class="flex ">
                        <div
                            class="ml-4 max-w-sm bg-white border border-green-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex flex-col items-center px-8 pt-4">
                                <a href="/gestor/empresa/{{$empresa->id}}/terrenos"><img
                                        class="w-20 h-20 mb-3 rounded-full shadow-lg"
                                        src="{{ asset($empresa->imagen) }}"
                                        alt="Bonnie image" /></a>

                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><a
                                        href="/gestor/empresa/{{$empresa->id}}/terrenos">{{ $empresa->nombre }}</a>
                                </h5>
                                <div class="flex mt-4 space-x-3 md:mt-6 mb-4">
                                    <a href="/gestor/empresa/{{ $empresa->id }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-green-600 rounded-lg hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700  dark:hover:border-gray-700 dark:focus:ring-gray-700">Info</a>
                                    <a href="/gestor/editar/empresa/{{ $empresa->id }}"
                                        class="ml-2 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-green-600 rounded-lg hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700  dark:hover:border-gray-700 dark:focus:ring-gray-700">Editar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
