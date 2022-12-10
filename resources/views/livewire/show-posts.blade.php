<div wire:init="loadPosts">

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
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entradas</span>
                </div>
                <x-jet-input class="flex-1 mx-4" placeholder="¿Qué buscas?" type="text" wire:model="search" />
                @livewire('create-post')
            </div>

            @if (count($posts)){{-- $posts->count() --}}

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
                                <div class="font-bold text-lg text-center"><a href="">Editar</a></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">

                        @foreach ($posts as $item)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                            src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg"
                                            width="40" height="40" alt="Alex Shatov"></div> --}}
                                        <div class="font-medium text-dark-800">{{ $item->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left text-base">{{ $item->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-bold text-blue-500 text-base">{!! $item->content !!}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap flex">
                                    {{-- @livewire('edit-post', ['post' => $post], key($post->id))Se el conoce como anidamiento --}}
                                    <a href="#" class="text-lg text-center text-base"
                                        wire:click="edit({{ $item }})"><svg class="h-8 w-8 text-red-500"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                        </svg>
                                    </a>

                                    <a class="btn btn-red ml-2"
                                        wire:click="$emit('deletePost', {{ $item->id }})">{{-- Eventos --}}
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($posts->hasPages())
                    <div class="px-6 py3">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                @if ($readyToLoad == false)
                    <div class="flex justify-center items-center">
                        <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full"
                            role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                @elseif(!count($posts))
                    <div class="px-6 py-4">
                        No se encontro lo que buscas😥
                    </div>
                @endif

            @endif



        </x-table>
    </div>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Editar el post {{ $post->title }}
        </x-slot>

        <x-slot name='content'>

            <div wire:loading wire:target="image"
                class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">¡Imagen cargando!</p>
                        <p class="text-sm">Espera un momento hasta que se procese la imagen.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center h-screen">
                @if ($image)
                    <img class="mb-4 rounded" src="{{ $image->temporaryUrl() }}" width="50%" height="50%">
                @elseif($post->image)
                    <img src="{{ Storage::url($post->image) }}" alt="">
                @endif
            </div>

            <div>
                <x-jet-label value="Titulo del post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full" />{{-- wire:model="post.title" /Para capturar el valor title --}}
            </div>
            <div>
                <x-jet-label value="Contenido del post" />
                <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('deletePost', postId => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podras revertir la acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!'
                }).then((result) => {

                    Livewire.emitTo('show-posts', 'delete', postId);


                    if (result.isConfirmed) {
                        Swal.fire(
                            'Eliminado!',
                            'Tu archivo ha sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
