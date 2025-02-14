<div class="p-10 bg-white border-b border-gray-200">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10">
            {{-- Nombre de la empresa --}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span
                    class="normal-case font-normal">{{ $vacante->empresa }}</span></p>
            {{-- Ultimo dia para postularse --}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Último día para postularse:
                <span class="normal-case font-normal">
                    {{ \Carbon\Carbon::parse($vacante->ultimo_dia)->toFormattedDateString() }}
                </span>
            </p>
            {{-- Categoria --}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría: <span
                    class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span></p>
            {{-- Salario --}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: <span
                    class="normal-case font-normal">{{ $vacante->salario->salario }}</span></p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            {{-- Imagen  --}}
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt={{ 'Imagen de la vacante' . $vacante->titulo }}>
        </div>
        {{-- descripcion --}}
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del Puesto:</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Quieres postularte a esta vacante? <a class="font-bold text-indigo-600"
                    href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot



</div>
