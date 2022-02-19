<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <x-table>

            <div class="px-6 py-4 flex items-center">
                <x-jet-input class="flex-1 mr-2" placeholder="Escriba que quiere buscar" type="text"
                    wire:model='search' />
                @livewire('create-post')
            </div>

            {{-- si hay algún post despliega la tabla --}}
            @if ($posts->count())
                <table>
                    <thead>

                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">

                            {{-- ID --}}
                            <th width="10%" class="cursor-pointer px-4 py-3" wire:click="order('id')">
                                ID
                                {{-- sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <span style="float:right;"><i class="fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <span style="float:right;"><i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <span style="float:right;"><i class="fas fa-sort float-right">
                                @endif
                            </th>

                            {{-- Titulo --}}
                            <th class="cursor-pointer px-4 py-3" wire:click="order('title')">
                                Titulo
                                {{-- sort --}}
                                @if ($sort == 'title')
                                    @if ($direction == 'asc')
                                        <span style="float:right;"><i class="fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <span style="float:right;"><i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <span style="float:right;"><i class="fas fa-sort"></i>
                                @endif
                            </th>

                            {{-- Contenido --}}
                            <th scope="col" class="cursor-pointer px-4 py-3" wire:click="order('content')">
                                Contenido
                                {{-- sort --}}
                                @if ($sort == 'content')
                                    @if ($direction == 'asc')
                                        <span style="float:right;"><i class="fas fa-sort-alpha-up-alt"></i>
                                        @else
                                            <span style="float:right;"><i class="fas fa-sort-alpha-down-alt"></i>
                                    @endif
                                @else
                                    <span style="float:right;"><i class="fas fa-sort"></i>
                                @endif
                            </th>

                            {{-- Acción --}}
                            <th scope="col" class="px-4 py-3">Acción</th>

                        </tr>

                    </thead>

                    <tbody class="bg-white">

                        @foreach ($posts as $post)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-ms font-semibold border text-center"> {{ $post->id }}
                                </td>
                                <td class="px-4 py-3 text-ms border"> {{ $post->title }} </td>
                                <td class="px-4 py-3 text-ms border"> {{ $post->content }} </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                    @livewire('edit-post', ['post' => $post], key($post->id))
                                </td>
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
