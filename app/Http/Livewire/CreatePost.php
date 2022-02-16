<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;
    public $title, $content;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save(){
        // Agregar registro a la tabla posts
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['open','title','content']);

        $this->emitTo('show-posts','renderiza');
        $this->emit('alerta', 'El Post se creó satisfactoriamente');

    }
}
