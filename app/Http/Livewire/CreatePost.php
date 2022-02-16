<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;
    public $title, $content;

    protected $rules = [
        'title' => 'required|max:10',
        'content' => 'required|max:150',
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
        $this->validate();

        // Agregar registro a la tabla posts
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['open','title','content']);

        $this->emitTo('show-posts','renderiza');
        $this->emit('alerta', 'El Post se creó satisfactoriamente');
    }


    // se ejecuta cada vez que cambia una de las propiedades title or content
    public function updated($propertyName)
    {
        // cada vez que se da una letra checa si cumple con las reglas de validación
        $this->validateOnly($propertyName);
    }

}
