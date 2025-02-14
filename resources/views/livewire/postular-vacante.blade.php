<div class="bg-gray-100 p-5 my-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @else
        <form wire:submit.prevent='postular' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" accept=".pdf" wire:model="cv"
                    required />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
            <x-primary-button class="my-5">{{ __('Postularme') }}</x-primary-button>
        </form>
    @endif


</div>
