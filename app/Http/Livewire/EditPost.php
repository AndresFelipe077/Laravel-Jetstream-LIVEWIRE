<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{


    use WithFileUploads;

    public $open = false;
    public $post, $image, $identificador;

    protected $rules = [//Sincronizar datos para la vista edit-post
        'post.title'   => 'required',
        'post.content' => 'required',
    ];


    public function mount(Post $post)
    {
        $this->post = $post;

        $this->identificador = rand();

        
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]); //Eliminar foto antigua

            $this->post->image = $this->image->store('posts'); //Nueva imagen con nueva URL
        }

        $this->post->save(); //Actualizar post

        $this->reset(['open', 'image']);

        $this->identificador = rand();

        $this->emitTo('show-posts', 'render');

        $this->emit('alert', 'Actualización exitosa!!!');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
