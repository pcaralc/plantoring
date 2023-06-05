<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir nueva empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border rounded p-4 ">
                        
                        <x-form-add action='/admin/add/empresa' enctype='multipart/form-data'>

                            <x-input-add type='text' id="nombre" name='nombre' texto='Nombre: ' value='' required/>
                            <div class='row'>
                                <div class='col-3'>
                                    <div class="mb-3 p-2">
                                        <label for="descripcion" class="form-label">Descripción: </label>
                                        <textarea id="descripcion" name="descripcion" class="text-gray-900 rounded w-full" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <x-input-add type='text' id="ciudad" name='ciudad' texto='Ciudad: ' value='' required/>
                            <x-input-add type='text' id="telefono" name='telefono' texto='Teléfono: ' minlength="6" maxlength="14" value='' required/>
                            <x-input-add type='email' id="email" name='email' texto='Email: ' value='' required/>
                            <x-input-add type='text' id="latitud" name='latitud' texto='Latitud: ' value='' required/>
                            <x-input-add type='text' id="longitud" name='longitud' texto='Longitud: ' value='' required />
                            <x-input-add type='file' id="imagen" name='imagen' texto='Imagen de la empresa: ' value='' required/>

                            <div class='row'>
                                <div class='col-3'> 
                                    <div class="mb-3 p-2">
                                        <label for="gestor" class="form-label">Elige Gestor:</label>
                                        <select name="gestor" id="gestor" class="bg-gray-800 rounded text-light">
                                            <option value="">Gestor</option>
                                            @foreach ($gestores as $gestor)
            
                                                @if ($gestor->rol == 'gestor')
                                                    <option value="{{$gestor->id}}">{{$gestor->name}}</option>
                                                @endif
            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-3'> 
                                    <div class="mb-3 p-2">
                                        <input type="submit" value="Añadir" class="border rounded p-2 bg-white text-gray-900">
                                    </div>
                                </div>
                            </div>

                            

                            
                        </x-form-add>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
