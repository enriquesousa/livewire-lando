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

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->identificador = rand(); //init con numero al azar
    }

    public function save(){
        $this->validate();

        //check si escogieron una imagen, eliminamos imagen almacenada
        if ($this->image) {
            // eliminamos imagen almacenada
            Storage::delete([$this->post->image]);
            // subir nueva imagen
            $this->post->image = $this->image->store('public/posts');
        }

        $this->post->save();
        $this->reset(['open', 'image']);
        $this->identificador = rand();
        $this->emitTo('show-posts','renderiza');
        $this->emit('alerta', 'El Post se actualizó satisfactoriamente');
    }

    public function render(){
        return view('livewire.edit-post');
    }
}
