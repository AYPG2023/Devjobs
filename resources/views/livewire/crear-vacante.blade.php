<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'> <!-- Separada todos sus hijos o cada boton -->
    <!--Boton para vacante-->
    <div>
        <x-input-label for="titulo" :value="__('Nombre de la vacante')" />
        <x-text-input id="titulo"
            class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            type="text" wire:model="titulo" :value="old('titulo')" required autofocus autocomplete="titulo"
            placeholder="Nombre de la vacante" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>
    <!--Boton para seleccionar salario -->

    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario" id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <!--Boton para categoria -->

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model="categoria" id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!--Boton para nombre de la empresa-->

    <div>
        <x-input-label for="empresa" :value="__('Nombre de la empresa')" />
        <x-text-input id="empresa"
            class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            type="text" wire:model="empresa" :value="old('empresa')" required autofocus autocomplete="empresa"
            placeholder="Nombre de la empresa" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <!--Boton para caducidad de vacante-->

    <div>
        <x-input-label for="ultimo_dia" :value="__('Fecha de caducidad de postulación')" />
        <x-text-input id="ultimo_dia"
            class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" required autofocus autocomplete="ultimo_dia" />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <!--Boton para Descripción del trabajo-->

    <div>
        <x-input-label for="descripcion" :value="__('Descripción del trabajo')" />
        <textarea id="descripcion"
            class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
            wire:model="descripcion" placeholder="Descripción del trabajo" required autofocus autocomplete="descripcion">{{ old('descripcion') }}</textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <!--Boton para imagen-->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen"
            class="block mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            type="file" wire:model="imagen" accept="image/*" required /> <!--accept= "imagen/*" Funciona para que pueda aceptar cualquier tipo de imagen -->
            <div class="my-5 w-80">
                @if ($imagen)
                    Imagen:
                    <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen de la vacante">   <!--Esto funciona para que se pueda previsualizar la imagen antes que se suba al servidor --> 
                @endif <!--temporaryUrl Muestra la imagen temporalmente  -->
            </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Publicar vacante') }}
    </x-primary-button>
</form>

