<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nuevo correo</title>
    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #saludo {
            text-decoration: underline;
            color: gray;
        }

        #respuesta{
            font-weight: bold;
            color: green;
        }
    </style>
</head>

<body>
    <div>
        <p><strong>Buenas mi nombre es {{ $nombre }} y mi correo electrónico es
                {{ $correo }}</strong></p>
        <p>El motivo de este correo electrónico es:</p>
        <p>{{ $mensaje }}</p>
        <p id="respuesta">Solicito respuesta.</p>
        <p id="saludo"><em>Un saludo, {{ $nombre }}.</em></p>
    </div>

</body>

</html>
