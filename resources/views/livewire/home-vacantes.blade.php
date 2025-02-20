<div class="py-12">
    <!--Componente para buscador -->
    <livewire:filtrar-vacantes />

    <div class="max-w-7xl mx-auto px-4">
        <h3 class="text-4xl font-extrabold text-gray-700 mb-12 text-center">Nuestras Vacantes Disponibles</h3>
        <!--Esto hace que las vacantes se vean en 3 columanas una a la par de otra -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($vacantes as $vacante)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-gray-800">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="hover:text-indigo-500">
                                {{ $vacante->titulo }}
                            </a>
                        </h4>
                        <p class="text-gray-600 mt-2"><strong>Empresa:</strong> {{ $vacante->empresa }}</p>
                        <p class="text-gray-600 mt-2"><strong>Categoria:</strong> {{ $vacante->categoria->categoria }}</p>
                        <p class="text-gray-600 mt-2"><strong>Salario:</strong> {{ $vacante->salario->salario }}</p>
                        <p class="text-gray-500 text-sm mt-1">
                            📅 Último día para postularse:
                            <span class="font-medium text-gray-700">
                                {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}
                            </span>
                        </p>
                    </div>
                    <div class="bg-gray-100 p-4 flex justify-center">
                        <a href="{{ route('vacantes.show', $vacante->id) }}"
                            class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg text-sm uppercase tracking-wide hover:bg-indigo-700 transition duration-300">
                            Ver Vacante
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-600 text-lg font-medium">No hay vacantes aún</p>
            @endforelse
        </div>
    </div>
</div>
