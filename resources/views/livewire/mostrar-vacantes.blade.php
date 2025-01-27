<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between">
            <!-- Detalles de la vacante -->
            <div class="space-y-3">
                <a href="#" class="text-xl font-semibold text-gray-900">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia }}</p>
            </div>

            <!-- Botones -->
            <div class="flex gap-3 mt-5 md:mt-0 md:justify-end">
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                    Ver
                </a>
                <a href="#" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                    Editar
                </a>
                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                    Eliminar
                </a>
            </div>
        </div>
    @endforeach
</div>
