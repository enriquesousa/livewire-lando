<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- component -->
        <x-table>

            <div class="px-4 py-3">
                {{-- <input type="text" wire:model='search'> --}}
                <x-jet-input class="w-full" placeholder="Escriba que quiere buscar" type="text" wire:model='search' />
            </div>

            {{-- si hay algún post despliega la tabla --}}
            @if ($posts->count())
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Titulo</th>
                            <th class="px-4 py-3">Contenido</th>
                            <th class="px-4 py-3">Acción</th>
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
