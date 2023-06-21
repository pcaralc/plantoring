@extends('gestor.index')

@section('contenido')
    <h5 class="mb-6 uppercase text-2xl font-bold tracking-tight text-green-700 dark:text-white">
        Modificar Empresa</h5>
    <div class="mt-6 mb-6 p-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="container">
            <form method='POST' action='/gestor/update/empresa/{{ $empresa->id }}' enctype='multipart/form-data'
                class='card m-2'>
                @csrf
                @method('put')

                <x-input-add-gestor class="border border-black" type='text' id="nombre" name='nombre' texto='Nombre: '
                    value='{{ $empresa->nombre }}' placeholder="{{ $empresa->nombre }}" />
                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="descripcion" class="form-label">Descripción: </label>
                            <textarea id="descripcion" name="descripcion" class="pl-2 text-gray-900 rounded border border-gray-500 w-full"
                                >{{ $empresa->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
                <x-input-add-gestor type='text' id="ciudad" name='ciudad' texto='Ciudad: '
                    value='{{ $empresa->ciudad }}' placeholder="{{ $empresa->ciudad }}" />
                <x-input-add-gestor type='text' id="telefono" name='telefono' texto='Teléfono: ' minlength="6"
                    maxlength="14" value='{{ $empresa->telefono }}' placeholder="{{ $empresa->telefono }}" />
                <x-input-add-gestor type='email' id="email" name='email' texto='Email: '
                    value='{{ $empresa->email }}' placeholder="{{ $empresa->email }}" />
                <x-input-add-gestor type='text' id="latitud" name='latitud' texto='Latitud: '
                    value='{{ $empresa->latitud }}' placeholder="{{ $empresa->latitud }}" />
                <x-input-add-gestor type='text' id="longitud" name='longitud' texto='Longitud: '
                    value='{{ $empresa->longitud }}' placeholder="{{ $empresa->longitud }}" />
                <x-input-add-gestor type='file' id="imagen" name='imagen' texto='Imagen de la empresa: '
                    value='{{ $empresa->imagen }}' placeholder="{{ $empresa->imagen }}" />

                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <input type="submit" value="Modificar"
                                class="border border-green-600 rounded p-2 bg-green-700 text-white">
                        </div>
                    </div>
                </div>




            </form>

        </div>
    </div>
@endsection
