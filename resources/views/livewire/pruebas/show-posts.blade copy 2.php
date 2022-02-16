<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-table>

        <div class="px-4 py-3 flex items-center">
            {{-- <input type="text" wire:model='search'> --}}
            <x-jet-input class="flex-1 mr-2" placeholder="Escriba que quiere buscar" type="text" wire:model='search' />
            @livewire('create-post')
        </div>
        
        {{-- si hay algún post despliega la tabla --}}
        @if ($posts->count())
            <table>
                <thead class="flex-1">
                    
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="cursor-pointer px-4 py-3" wire:click="order('id')">
                            ID
                            {{-- sort --}}
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer px-4 py-3" wire:click="order('title')">
                            Titulo
                            {{-- sort --}}
                            @if ($sort == 'title')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-4 py-3" wire:click="order('content')">
                            Contenido
                            {{-- sort --}}
                            @if ($sort == 'content')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right"></i>
                            @endif 
                        </th>
                        <th scope="col" class="px-4 py-3">Acción</th>
                    </tr>

                </thead>
                <tbody class="bg-white">

                    @foreach ($posts as $post)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-ms font-semibold border"> {{ $post->id }} </td>
                        <td class="px-4 py-3 text-ms border"> {{ $post->title }} </td>
                        <td class="px-4 py-3 text-ms border"> {{ $post->content }} </td>
                        <td class="px-4 py-3 text-sm border">Edit</td>
                    </tr>    
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-4 py-3">
                No existe ningún registro coincidente.
            </div>
        @endif

    </x-table>
    </div>

</div>
