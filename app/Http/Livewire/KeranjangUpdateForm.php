<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KeranjangUpdateForm extends Component
{

    public $item = [];

    public $quantity = 0;

    public function mount($item)
    {
        $this->item = $item;

        $this->quantity = $item['quantity'];
    }

    public function updateKeranjang()
    {
        \Cart::session(auth()->id())->update($this->item['id'], [
            'quantity' => array(
                'relative' => false,
                'value' => $this->quantity
            ),
        ]);

        $this->emit('keranjangUpdated');
    }

    public function render()
    {
        return view('livewire.keranjang-update-form');
    }
}
