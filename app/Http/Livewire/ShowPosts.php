<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class ShowPosts extends Component
{
    // public  $titulo;//$title;
    // public $pieDePagina;

    // public function mount($title)
    // {
    //     $this->titulo = $title;
    // }
    // public $name;

    // public function mount($name)
    // {
    //     $this->name = $name;
    // }

    use WithFileUploads;//Para las imagenes
    use WithPagination;//Para las paginaciones


    public $post, $image, $identificador;
    public $search      = '';
    public $sort        = 'id';
    public $direction   = 'desc';
    public $cant        = '10'; 
    public $readyToLoad = false;
    public $open_edit   = false;

    // protected $listeners = ['render' => 'render']; es lo mismo que abajo solo que cuando ambos se llaman igual
    protected $listeners = ['render', 'delete'];

    protected $queryString = [//Cantidad de datos que se quiere en la url
        'cant'      => ['except' => '10'],
        'sort'      => ['except' => 'id'],
        'direction' => ['except' => 'desc'], 
        'search'    => ['except' => '']
    ];

    public function mount()
    {
        $this->identificador = rand();
        $this->post = new Post();
    }

    protected $rules = [
        'post.title'   => 'required',
        'post.content' => 'required',
    ];

    
    public function updatingSearch()//Funcion para qeu cambie entradas al input search es decir para resetear(algo asi)
    { 
        $this->resetPage();//Esto hace que elimine la paginacion y regrese a su estado inicial y asi pueda buscar libremente en todos los datos
    }

    public function render()
    {
        if($this->readyToLoad)
        {
            $posts = Post::where('title','like','%' . $this->search . '%')
                     ->orWhere('content', 'like' , '%' . $this->search . '%')
                     ->orderBy($this->sort, $this->direction)
                     ->paginate($this->cant);
        }
        else
        { 
            $posts = [];
        }

        return view('livewire.show-posts', compact('posts'));
        // return view('livewire.show-posts')
        //         ->layout('layouts.base');
    }

    public function loadPosts()
    { 
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort)
        {
            if($this->direction == 'desc')
            {
                $this->direction = 'asc';
            }
            else
            {
                $this->direction = 'desc';
            }
        }
        else
        {
            $this->sort      = $sort;
            $this->direction = 'asc';
        }

        
    }

    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]); //Eliminar foto antigua

            $this->post->image = $this->image->store('posts'); //Nueva imagen con nueva URL
        }

        $this->post->save(); //Actualizar post

        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();

        //$this->emitTo('show-posts', 'render');Ya no es necesario porque esta en la misma vista

        $this->emit('alert', 'Actualización exitosa!!!');
    }

    public function delete(Post $post)
    {
        $post->delete();
    }


}
