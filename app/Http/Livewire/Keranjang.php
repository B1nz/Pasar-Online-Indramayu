<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Keranjang extends Component
{
    public $keranjangItems = [];

    protected $listeners = ['keranjangUpdated' => 'onKeranjangUpdate'];

    public function mount()
    {
        $this->keranjangItems = \Cart::session(auth()->id())->getContent()->toArray();
    }

    public function onKeranjangUpdate()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.keranjang');
    }
}
