<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mofificar empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">

                        <form method='POST' action='/admin/update/empresa/{{ $empresa->id }}'
                            enctype='multipart/form-data' class='card m-2'>
                            @csrf
                            @method('put')

                            <x-input-add type='text' id="nombre" name='nombre' texto='Nombre: '
                                value='{{ $empresa->nombre }}' placeholder="{{ $empresa->nombre }}" />
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="descripcion" class="form-label">Descripción: </label>
                                        <textarea id="descripcion" name="descripcion" class="rounded text-gray-900 w-full" 
                                            placeholder="{{ $empresa->descripcion }}">{{ $empresa->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <x-input-add type='text' id="ciudad" name='ciudad' texto='Ciudad: '
                                value='{{ $empresa->ciudad }}' placeholder="{{ $empresa->ciudad }}" />
                            <x-input-add type='text' id="telefono" name='telefono' texto='Teléfono: ' minlength="6"
                                maxlength="14" value='{{ $empresa->telefono }}'
                                placeholder="{{ $empresa->telefono }}" />
                            <x-input-add type='email' id="email" name='email' texto='Email: '
                                value='{{ $empresa->email }}' placeholder="{{ $empresa->email }}" />
                            <x-input-add type='text' id="latitud" name='latitud' texto='Latitud: '
                                value='{{ $empresa->latitud }}' placeholder="{{ $empresa->latitud }}" />
                            <x-input-add type='text' id="longitud" name='longitud' texto='Longitud: '
                                value='{{ $empresa->longitud }}' placeholder="{{ $empresa->longitud }}" />
                            <x-input-add type='file' id="imagen" name='imagen' texto='Imagen de la empresa: '
                                value='{{ $empresa->imagen }}' placeholder="{{ $empresa->imagen }}" />

                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="gestor" class="form-label">Elige Gestor:</label>
                                        <select name="gestor" id="gestor" class="bg-gray-800 rounded text-light">
                                            @foreach ($gestores as $gestor)
                                                @if ($gestor->rol == 'gestor')
                                                    <option value="{{ $gestor->id }}">{{ $gestor->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <input type="submit" value="Modificar"
                                            class="border rounded p-2 bg-white text-gray-900">
                                    </div>
                                </div>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
