<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-500 text-white font-bold text-lg text-center p-2 mb-2">
                    {{ session('mensaje') }}
                </div>
            @endif
        <livewire:mostrar-vacantes/> 

        </div>
    </div>
</x-app-layout>
