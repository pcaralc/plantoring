<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantoring</title>
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <style>
        .text-gradient {
            background: linear-gradient(to right, #284428, #569156, #CCFFCC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <script>
        function aumentarTarjeta(element) {
            element.style.transform = 'scale(1.2)';
        }

        function restaurarTarjeta(element) {
            element.style.transform = 'scale(1)';
        }
    </script>

</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">
    <!--Header-->
    <div class="w-full m-0 p-0 bg-cover bg-bottom"
        style="background-image:url('{{ asset($empresa->imagen) }}'); height: 60vh; max-height:460px;">
        <div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
            <!--Title-->
            <p class="font-semibold text-gradient uppercase italic dark:text-green-500 text-6xl md:text-6xl">
                {{ $empresa->nombre }}
            </p>
        </div>
    </div>



    <!--Container-->
    <div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">

        <div class="mx-0 sm:mx-6">

            <div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">
                <!--nav-->
                <nav class=" mt-40 flex px-5 py-3 text-gray-700 border border-green-400 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
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
                <!--/nav-->

                <div
                    class="mt-12 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <div class="container">
                        <h5
                            class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                            {{ $empresa->nombre }}</h5>

                        <div class="ml-8">
                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Nombre: </strong>
                                {{ $empresa->nombre }}</p>
                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Descripción:
                                </strong>
                                {{ $empresa->descripcion }}</p>

                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Ciudad:
                                </strong>
                                {{ $empresa->ciudad }}</p>

                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Latitud:
                                </strong>
                                {{ $empresa->latitud }}</p>
                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Longitud:
                                </strong>
                                {{ $empresa->longitud }}</p>


                            <p class="ml-4 mt-2 text-lg text-green-700 font-medium underline decoration-green-400 ">
                                Información de contacto</p>
                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Email:
                                </strong>
                                {{ $empresa->email }}</p>
                            <p class="ml-4 mb-3 font-normal text-lg text-gray-700 dark:text-gray-400"><strong>
                                    Teléfono:
                                </strong>
                                {{ $empresa->telefono }}</p>

                        </div>

                        <div class='col rounded mt-3 ml-12'>
                            <iframe
                                src="https://maps.google.com/maps?q={{ $empresa->latitud }},{{ $empresa->longitud }}&output=embed"
                                class="rounded w-5/6 h-40  mt-8"></iframe>
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

    <footer class="bg-green-700 rounded mt-40 ">
        <div class="container  mx-auto  items-center px-2 py-8">

            <div class="w-full mx-auto items-center">
                <div class="flex w-full pt-2 md:w-1/2 md:justify-end">
                    <ul class=" flex flex-col justify-center flex-1 md:flex-none items-center">
                        <li>
                            <a class="text-white font-bold no-underline hover:text-gray-400 hover:no-underline ml-2"
                                href="/empresa/{{ $empresa->id }}">
                                {{ $empresa->nombre }}
                            </a>
                        </li>
                        <li>
                            <a class=" py-2 px-3 text-white no-underline" href="/">Plantoring</a>
                        </li>
                        <li>
                            <p class="py-2 px-3 text-white no-underline">&copy;Plantoring 2023</p>
                        </li>
                    </ul>
                </div>
            </div>




        </div>
    </footer>





</body>

</html>
