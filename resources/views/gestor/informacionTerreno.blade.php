@extends('gestor.index')

@section('barra')
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>volver</span></p>
    <a href="/gestor/empresa/{{ $terreno->empresa_id }}/terrenos"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-columns-gap" viewBox="0 0 16 16">
            <path
                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
        </svg>
        Terrenos
    </a>

    <p class="border-t border-gray-200"></p>
    <p class="flex items-center text-green-700 pl-4 mt-4 uppercase text-lg nav-item"><span>Plantaciones</span></p>

    <a href="/gestor/plantacion/add/{{ $terreno->id }}"
        class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Añadir Plantación
    </a>
    <a href="/gestor/buscador" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-search" viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
        Buscador
    </a>
@endsection

@section('contenido')
    <style>
        .boton-alerta {
            position: fixed;
            top: 80px;
            right: 50px;
            width: 40px;
            height: 40px;
            background-color: rgb(224, 138, 10);
            border-radius: 50%;
            cursor: pointer;
        }

        .alerta {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 350px;
            background-color: #ece9e9;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .notification {
            display: none;
            position: fixed;
            top: 80px;
            right: 95px;
            background-color:chocolate;
            color: black;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            font-weight: bold;
        }
    </style>

    <div class="mt-6 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">

            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">

                <div>
                    <h5 class="mb-6 text-center uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
                        {{ $terreno->nombre }}</h5>

                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Nombre: </strong>
                        {{ $terreno->nombre }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Descripción: </strong>
                        {{ $terreno->descripcion }}</p>


                    @if ($terreno->ecologico == 0)
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Ecologico: </strong> No
                        </p>
                    @else
                        <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Ecologico: </strong> Si
                        </p>
                    @endif

                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Latitud: </strong>
                        {{ $terreno->latitud }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Longitud: </strong>
                        {{ $terreno->longitud }}</p>
                    <p class="ml-4 mb-3 font-normal text-gray-700 dark:text-gray-400"><strong> Temperatura: </strong>
                        {{ $terreno->temperatura }} &#8451</p>

                    <div class="flex mt-4 space-x-3 md:mt-6 mb-4">
                        <a href="/gestor/editar/terreno/{{ $terreno->id }}"
                            class=" ml-4 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-green-600 rounded-lg hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Editar</a>

                        <a href="/gestor/delete/terreno/{{ $terreno->id }}"
                            class=" ml-2 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-green-600 rounded-lg hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700  dark:hover:border-gray-700 dark:focus:ring-gray-700"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></a>



                    </div>

                    {{-- ALERTA TEMPERATURA --}}
                    @php
                        $plantaciones = [];
                    @endphp

                    @foreach ($plantas as $planta)
                        @if ($terreno->temperatura > $planta->temp_max || $terreno->temperatura < $planta->temp_min)
                            @php
                                $plantaciones[] = $planta->nombre;
                            @endphp
                        @endif
                    @endforeach

                    @if (!empty($plantaciones))

                        <div class="boton-alerta " id="mi-alerta">
                            <div id="notification" class="notification"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="mt-0.5 ml-1 bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path
                                    d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                <path
                                    d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                            </svg>
                        </div>

                        <div class="alerta border border-green-600 rounded" id="mi-plantaciones">

                            <p class="font-bold ml-3 mt-3 italic">La temperatura actual ({{ $terreno->temperatura }}&#8451)
                                puede afectar las siguientes plantaciones:</p>
                            @foreach ($plantaciones as $plantacion)
                                <ul>
                                    <li class="ml-12 list-disc">{{ $plantacion }}</li>
                                </ul>
                            @endforeach
                        </div>
                    @endif

                    {{-- FIN ALERTA TEMPERATURA --}}

                </div>

                <div class='col rounded mt-8 '>
                    <iframe width="60%" height="250"
                        src="https://maps.google.com/maps?q={{ $terreno->latitud }},{{ $terreno->longitud }}&output=embed"
                        class="rounded border border-green-500"></iframe>
                </div>


            </div>

        </div>

    </div>




    <div class=" mt-6 mb-6  p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex">
            <h1 class="uppercase text-xl font-bold text-green-700 mt-3 mb-3">Plantaciones </h1>
        </div>

        <div class="container">
            @foreach ($plantas as $planta)
                <li class="list-none border border-green-400 rounded mb-2">
                    <div class="flex  h-32 bg-white rounded overflow-hidden shadow-lg ">
                        <a href="/gestor/plantacion/{{ $planta->id }}"
                            class="flex flex-wrap no-underline hover:no-underline ">
                            <div class="w-full md:w-1/5 rounded-t">
                                <img src="{{ asset($planta->imagen) }}" class="h-full w-full shadow">
                            </div>

                            <div class="w-full md:w-1/3 pl-4 flexflex-col flex-grow flex-shrink">
                                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                    <div class="w-full font-bold text-xl text-gray-900 px-6 py-2 ">
                                        {{ $planta->nombre }}
                                    </div>
                                    <p class="text-gray-700 font-normal text-base px-6 mb-5  ">
                                        {{ $planta->descripcion }}<br>
                                    <div class="ml-6 flex">
                                        <p class="text-gray-400 text-xs md:text-sm">Temp. min: {{ $planta->temp_min }}
                                            &#8451</p>
                                        <p class=" ml-8 text-gray-400 text-xs md:text-sm">Temp.
                                            max: {{ $planta->temp_max }} &#8451</p>
                                    </div>
                                    </p>
                                </div>
                            </div>

                        </a>
                    </div>
                </li>
            @endforeach
        </div>
    </div>


    <script>
        const botonFlotante = document.getElementById('mi-alerta');
        const plantaciones = document.getElementById('mi-plantaciones');

        botonFlotante.addEventListener('click', function() {
            if (plantaciones.style.display === 'none') {
                plantaciones.style.display = 'block';
            } else {
                plantaciones.style.display = 'none';
            }
        });


        document.addEventListener("DOMContentLoaded", function() {
            var notification = document.getElementById("notification");
            notification.textContent = "¡La temperatura puede afectar!";
            notification.style.display = "block";

            setTimeout(function() {
                notification.style.display = "none";
            }, 3000); // Ocultar la notificación después de 2 segundos
        });
    </script>
@endsection
