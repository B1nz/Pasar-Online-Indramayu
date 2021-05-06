<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    {{-- <form wire:submit.prevent='updateKeranjang'">
        <input wire:model="quantity" type="number">

        <input type="submit" value="save" class="button">
    </form> --}}

    <input wire:model="quantity" type="number" wire:change="updateKeranjang">

</div>
