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
                    class="normal-case font-normal">{{ $vacante->categoria_id }}</span></p>
            {{-- Salario --}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: <span
                    class="normal-case font-normal">{{ $vacante->salario_id }}</span></p>
        </div>
    </div>
</div>
