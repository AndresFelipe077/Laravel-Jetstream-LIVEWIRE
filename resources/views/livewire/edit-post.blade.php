<div>
    <a href="#" class="text-lg text-center text-base" wire:click="$set('open',true)"><svg class="h-8 w-8 text-red-500"
            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
        </svg>
    </a>


    <x-jet-dialog-modal wire:model="open">

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
                @else
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
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>




</div>
