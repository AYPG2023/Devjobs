<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaiones.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-center my-10">Mis Notificaiones</h1>
                    @forelse ($notificaciones as $notificacion)
                        <li class="p-3 flex items-center">
                            <div
                                class="flex items-center gap-4 p-4 bg-white shadow-md rounded-lg border border-gray-200">
                                <!-- Ícono de notificación -->
                                <div class="w-12 h-12 flex items-center justify-center bg-gray-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                    </svg>
                                </div>
                                <!-- Información de la notificación -->
                                <div class="flex-1">
                                    <p class="text-xl font-semibold text-gray-900">Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>
                                    <p class="text-sm text-gray-500 flex items-center gap-1 mt-1">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7v10M12 7v10m4-10v10"></path>
                                        </svg>
                                        <span class="font-medium text-gray-700">Hace:</span>
                                        <span
                                            class="font-normal text-gray-600">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <!-- Botón de acción -->
                                <div>
                                    <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                        class="px-4 py-2 bg-indigo-500 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition duration-300">
                                        Ver Candidatos
                                    </a>
                                </div>
                            </div>
                        </li>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-600">No tienes notificaciones</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
