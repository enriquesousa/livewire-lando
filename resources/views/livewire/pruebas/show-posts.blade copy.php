<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="px-4 py-3 flex items-center">
            {{-- <input type="text" wire:model='search'> --}}
            <x-jet-input class="flex-1 mr-2" placeholder="Escriba que quiere buscar" type="text" wire:model='search' />
            @livewire('create-post')
        </div>
        
        {{-- si hay algún post despliega la tabla --}}
        @if ($posts->count())

            <div>
                <div class="flex justify-between bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-md py-2 px-4 text-white font-bold text-md">
                    <div>
                        <span>
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
                        </span>
                    </div>
                    <div>
                        <span>
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
                        </span>
                    </div>
                    <div>
                        <span>
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
                        </span>
                    </div>
                    <div>
                        <span>
                            Acción
                        </span>
                    </div>
                </div>
                <div>

                    @foreach ($posts as $post)

                    <div class="flex justify-between border-t text-sm font-normal mt-4 space-x-4">
                        <div class="px-2 flex">
                            <span>{{ $post->id }}</span>
                        </div>
                        <div>
                            <span>{{ $post->title }}</span>
                        </div>
                        <div class="px-2">
                            <span>{{ $post->content }}</span>
                        </div>
                        <div class="px-2">
                            <select>
                                <option>Edit</option>
                                <option>Eliminar</option>
                            </select>
                        </div>
                    </div>

                    @endforeach
                    
                </div>
            </div>

        @else
            <div class="px-4 py-3">
                No existe ningún registro coincidente.
            </div>
        @endif

    </div>

</div>
