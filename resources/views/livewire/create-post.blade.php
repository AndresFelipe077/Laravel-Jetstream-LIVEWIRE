<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo POST
    </x-jet-danger-button>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">Crear Nuevo POST
        </x-slot>
        <x-slot name="content">

            {{-- <div wire:loading wire:target="image"
                class="mb-4 bg-stone-400 border border-stone-400 text-stone-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold"></strong>
                <span class="block sm:inline"></span>
            </div> --}}

            <div wire:loading wire:target="image"
                class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
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
                @endif
            </div>



            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" wire:model='title' /> {{-- defer nos ayuda a no renderizar, 
                                                                                        pero cuando el backend de esta vista tenemos las validaciones ya 
                                                                                        no es necesario por su function de update y asi mostrar el mensaje 
                                                                                        cuando no se cumpla las rules --}}

                {{-- Utilizando de manera normal --}}
                {{-- @error('title')
                    <h3>{{$message}}</h3>
                @enderror --}}

                {{-- Utilizando componente de laravel jet --}}

                <x-jet-input-error for="title" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <textarea wire:model.defer="content" class="form-control w-full" rows="6"></textarea>
                {{-- Normal --}}
                {{-- @error('content')
                    <h3>{{$message}}</h3>
                @enderror --}}

                {{-- Con el componente --}}
                <x-jet-input-error for="content" />
            </div>


            <div>
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                class="disabled:opacity-25">{{-- wire:loading.remove //Para cuando se tenida el span abajo --}}
                {{-- wire:loading.attr="disabled" nos ayuda a deshabilitar el boton para que el usuario no envie muchos forms --}}
                Crear post {{-- wire:loading.attr="disable" //nos ayuda a dar styles a el btn --}}
            </x-jet-danger-button>

            {{-- <span wire:loading wire:target="save">Cargando...</span> --}}

        </x-slot>
    </x-jet-dialog-modal>

</div>
