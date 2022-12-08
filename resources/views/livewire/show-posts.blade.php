<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LIVEWIRE') }}
        </h2>
    </x-slot>

    {{-- Be like water. --}}
    {{-- {{$title}} --}}
    {{-- {{$titulo}} --}}
    <h1>Hola mundo</h1>
    {{-- {{$pieDePagina}} --}}
    {{-- <p>Bienvenido {{$name}}!!!</p> --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- {{$search}} --}}
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <x-jet-input class="flex-1 mr-4" placeholder="¿Qué buscas?" type="text" wire:model="search" />
                @livewire('create-post')
            </div>

            @if ($posts->count())

                <table class="table-auto w-full">
                    <thead class="text-xs font-bold uppercase text-dark-400 bg-orange-50">
                        <tr>
                            <th class="w-24 p-2 whitespace-nowrap">
                                <div class="cursor-pointer text-lg font-bold text-center" wire:click="order('id')">
                                    ID
                                    {{-- sort --}}
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif()
                                </div>
                            </th>
                            <th class="w-24 p-2 whitespace-nowrap">
                                <div class="cursor-pointer text-lg font-bold text-center" wire:click="order('title')">
                                    Titulo
                                    {{-- sort --}}
                                    @if ($sort == 'title')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif()
                                </div>
                            </th>
                            <th class="w-24 p-2 whitespace-nowrap">
                                <div class="cursor-pointer text-lg font-bold" wire:click="order('content')">
                                    Contenido
                                    {{-- sort --}}
                                    @if ($sort == 'content')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif()
                                </div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-bold text-lg text-center">Editar</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">

                        @foreach ($posts as $post)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                            src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg"
                                            width="40" height="40" alt="Alex Shatov"></div> --}}
                                        <div class="font-medium text-dark-800">{{ $post->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-base">{{ $post->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-bold text-blue-500 text-base">{{ $post->content }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <a href="" class="text-lg text-center text-base"><svg
                                            class="h-8 w-8 text-red-500" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                        </svg></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No se encontro lo que buscas😥
                </div>

            @endif
        </x-table>
    </div>



</div>
