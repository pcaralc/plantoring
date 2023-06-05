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
        .boton-flotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: rgb(7, 171, 7);
            /* Color de fondo del botón */
            border-radius: 50%;
            cursor: pointer;
        }

        .formulario {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 350px;
            background-color: #ece9e9;
            display: none;
            /* Oculta el formulario inicialmente */
            align-items: center;
            justify-content: center;
            padding-left: 4%;
            padding-right: 5%;
        }
    </style>

</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">


    <!--Header-->
    <div class="w-full m-0 p-0 bg-cover bg-bottom"
        style="background-image:url('https://cdn.pixabay.com/photo/2019/05/07/13/57/seedlings-4186033_1280.jpg'); height: 60vh; max-height:460px;">
        <div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
            <!--Title-->
            <p class="text-white font-extrabold text-3xl md:text-5xl">
                @yield('titulo')
            </p>
        </div>
    </div>


    <!--Container-->
    <div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">

        <div class="mx-0 sm:mx-6">

            <div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">

                <!--Lead Card-->
                <div class="flex h-full bg-white rounded overflow-hidden shadow-lg ">
                    <a href="/empresa/{{ $empresa->id }}" class="flex flex-wrap no-underline hover:no-underline "
                        onmouseover="aumentarTarjeta(this)" onmouseout="restaurarTarjeta(this)">
                        <div class="w-full md:w-1/3 rounded-t">
                            <img src="{{ asset($empresa->imagen) }}" class="h-full w-full shadow">
                            <!--imagen de la empresa-->
                        </div>

                        <div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                <div class="w-full font-bold text-xl text-gray-900 px-6 py-8">{{ $empresa->nombre }}
                                </div>
                                <p class="text-gray-800 font-serif text-base px-6 mb-5  ">
                                    En nuestra empresa, cosechamos la naturaleza en su máximo esplendor, brindando
                                    alimentos frescos y de calidad que se traducen en salud, sustentabilidad y
                                    satisfacción en cada bocado. <br>
                                </p>
                            </div>

                            <div
                                class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                                <div class="flex items-center justify-between">

                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <!--/Lead Card-->

                @if (Request::is('/'))
                    <div class="mt-40 uppercase text-green-700">
                        <p class="font-semibold">Terrenos</p>
                    </div>

                    <!--Posts Container-->
                    <div class="flex flex-wrap justify-center pt-8 -mx-6 rounded">

                        @foreach ($terrenos as $terreno)
                            <div class="w-full md:w-1/3 p-6 " onmouseover="aumentarTarjeta(this)"
                                onmouseout="restaurarTarjeta(this)">
                                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                    <a href="/terreno/{{ $empresa->id }}/{{ $terreno->id }}"
                                        class="flex flex-wrap no-underline hover:no-underline">
                                        <img src="{{ asset($terreno->imagen) }}" class="h-64 w-full rounded-t pb-6">
                                        <!--imagenes de los terrrenos-->
                                        <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $terreno->nombre }}
                                        </div>
                                        <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                            {{ $terreno->descripcion }}
                                        </p>
                                    </a>
                                </div>
                                <div
                                    class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                                    <div class="flex items-center justify-between">
                                        @if ($terreno->ecologico == 0)
                                            <p class="text-gray-400 text-xs md:text-sm">Ecológico: No </p>
                                        @else
                                            <p class="text-gray-400 text-xs md:text-sm">Ecológico: Si </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    @yield('contenido')
                @endif

            </div>


            <!--Boton contacto -->
            <div class="boton-flotante" id="mi-boton"><svg class="mt-1 ml-1.5" xmlns="http://www.w3.org/2000/svg"
                    width="40" height="40" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                    <path
                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    <path
                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                </svg></div>

            <div class="formulario border border-green-600 rounded" id="mi-formulario">
                <h1 class="text-2xl font-bold mb-4">CONTACTANOS</h1>
                <form action="/enviar" method="POST">
                    @csrf
                    <input type="text"
                        class="m-full pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        name="nombre" placeholder="Nombre" required>
                    <input type="email"
                        class="-full pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        name="correo" placeholder="Correo electrónico" required>
                    <textarea name="asunto"
                        class="w-full pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        placeholder="Asunto" required></textarea>
                    <textarea name="mensaje"
                        class="w-full pl-2 mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        placeholder="Mensaje" required></textarea><br>

                    <button type="submit"
                        class="bg-green-600 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">Enviar</button>
                </form>

            </div>
            <!--fin boton contacto -->

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
    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script>
        //Init tooltips
        tippy('.avatar')
    </script>
    <script>
        function aumentarTarjeta(element) {
            element.style.transform = 'scale(1.2)';
        }

        function restaurarTarjeta(element) {
            element.style.transform = 'scale(1)';
        }


        const botonFlotante = document.getElementById('mi-boton');
        const formulario = document.getElementById('mi-formulario');

        botonFlotante.addEventListener('click', function() {
            if (formulario.style.display === 'none') {
                formulario.style.display = 'block';
            } else {
                formulario.style.display = 'none';
            }
        });
    </script>
</body>

</html>
