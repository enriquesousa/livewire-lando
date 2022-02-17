<div>
    {{-- Do your work, then step back. --}}
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>

        <x-slot name='title'>
            Crear nuevo post
        </x-slot>

        <x-slot name='content'>

            {{-- tailwind alert --}}
            <div wire:loading wire:target='image' class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Cargando imagen!</strong>
                <span class="sm:inline">Espere un momento ...</span>
                {{-- con block lo baja una linea --}}
                {{-- <span class="block sm:inline">Espere un momento, en lo que procesa ...</span>  --}}
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
                {{ sleep(1) }}
            @endif

            {{-- Titulo del post --}}
            <div class="mb-4">
                <x-jet-label value="Título del Post"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="title"></x-jet-input>
                <x-jet-input-error for='title' />
            </div>

            {{-- Contenido del post --}}
            <div class="mb-4">
                <x-jet-label value="Contenido del Post"></x-jet-label>
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea>
                <x-jet-input-error for='content' />
            </div>

            {{-- imagen del post --}}
            <div>
                <input type="file" wire:model='image' id="{{ $identificador }}">
                <x-jet-input-error for='image' />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target='save, image'
                class="disabled:opacity-25">
                Crear Post
            </x-jet-danger-button>

            {{-- solo mostrar span cuando se esta ejecutando el método save --}}
            {{-- <span wire:loading wire:target='save'>Cargando ...</span> --}}
        </x-slot>

    </x-jet-dialog-modal>

</div>
