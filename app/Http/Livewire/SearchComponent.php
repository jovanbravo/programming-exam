<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;
    public $type;
    public $types;

    public function render()
    {
        $search = '%'. $this->search . '%';
        $this->types = Type::query()->where('type_name','Like', $search)->get();
        
        return view('livewire.search-component');
    }

   
}
