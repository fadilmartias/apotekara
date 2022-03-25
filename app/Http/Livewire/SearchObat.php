<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Obat;

class SearchObat extends Component
{
    public $query;

    public $obats;

    public function mount()
    {
        $this->query = '';

        $this->obats = [];
    }

    public function updatedQuery()
    {
        $this->obats = Obat::where('nama_obat','like','%' .$this->query. '%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.search-obat', [
            'obats' => Obat::where('nama_obat', $this->search)->get(),
        ]);
    }
}
