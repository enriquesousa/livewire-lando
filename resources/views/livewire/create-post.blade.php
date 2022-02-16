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
            <div class="mb-4">
                <x-jet-label value="Título del Post"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del Post"></x-jet-label>
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Crear Post
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>