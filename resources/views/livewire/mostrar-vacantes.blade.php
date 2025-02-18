<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <!--Esto dunciona para poder mostrar las vacantes y si no hay que muestre no hay vacantes -->
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200  md:flex md:justify-between md:items-center">
                <!-- Detalles de la vacante -->
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-semibold text-gray-900">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia }}</p>
                </div>

                <!-- Botones -->
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="#"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                        Ver
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})" 
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-lg text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-gray-500">No hay vacantes disponibles</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-10 ">
        {{ $vacantes->links() }}
    </div>

</div>

 {{-- Scripts que da funcionalidad a una aletar para poder eliminar la vacante nos vamos al app.blade y abajo del  @livewireScripts ponemos
    @stack('scripts') y aca usamos el push para llamar el scripts--}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Una vez eliminada, no se podrá recuperar la vacante!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar vacante del servidor
                        Livewire.dispatch('eliminarVacante', { vacante: vacanteId });
    
                        Swal.fire(
                            '¡Eliminado!',
                            'La vacante ha sido eliminada.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>
    
@endpush
