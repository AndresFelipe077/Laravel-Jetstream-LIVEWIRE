<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = false;

    public $title, $content, $image, $identificador;

    public function mount() //funcion para resetear el input del file ya que como es inmutable no se cambia
    {
        $this->identificador = rand();
    }

    protected $rules = [
        // 'title'   => 'required|max:10',
        // 'content' => 'required|min:100'
        'title'   => 'required',
        'content' => 'required',
        'image'   => 'required|image|max:2048'
    ];

    // Funcion para mostrar un mensaje cuando no se cumpla los $rules
    // public function update($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {

        $this->validate();

        $image = $this->image->store('posts');

        Post::create([
            'title'   => $this->title,
            'content' => $this->content,
            'image'   => $image
        ]);

        $this->reset(['open', 'title', 'content', 'image']);

        $this->identificador = rand();

        $this->emitTo('show-posts', 'render');
        $this->emit('alert', 'Se creo correctamente el contenido');
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function updatingOpen()
    {
        if($this->open == false)
        {
            $this->reset(['content', 'title', 'image']);
            $this->identificador = rand();
            $this->emit('resetCKEditor');
        }
        
    }

}
