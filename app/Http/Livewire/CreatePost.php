<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = false; // para indicar si la ventana modal de CreatePost esta visible o no
    public $title, $content, $image, $identificador;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048', //image max 2Mb
    ];

    public function render(){
        return view('livewire.create-post');
    }

    public function mount(){
        $this->identificador = rand(); //init con numero al azar
    }

    public function save(){
        sleep(1);
        $this->validate();

        // guardar la imagen en carpeta public/posts
        $image_url = $this->image->store('public/posts');

        // Agregar registro a la tabla posts
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image_url,
        ]);

        $this->reset(['open','title','content','image']);
        $this->identificador = rand(); //init con numero al azar

        $this->emitTo('show-posts','renderiza');
        $this->emit('alerta', 'El Post se creó satisfactoriamente');
    }


    // se ejecuta cada vez que cambia una de las propiedades title or content
    // public function updated($propertyName)
    // {
    //     // cada vez que se da una letra checa si cumple con las reglas de validación
    //     $this->validateOnly($propertyName);
    // }

}
