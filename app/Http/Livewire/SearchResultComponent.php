<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchResultComponent extends Component
{
    public $searchs;

    
    public function render()
    {
        return view('livewire.search-result-component');
    }
}
