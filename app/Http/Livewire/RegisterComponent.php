<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    public $typeName;
    public $subtypeName;
    public $types;
    public $subtypes;
    public $subsubtypes;

    public function render()
    {
        $this->types = Type::query()->where('parent_id', '=', null)->get();
        $this->subtypes = Type::query()->where('parent_id', '!=', null)->where('parent_id', $this->typeName)->get();
        $this->subsubtypes = Type::query()->where('parent_id', '!=', null)->where('parent_id', $this->subtypeName)->get();
    
        return view('livewire.register-component')->extends('layouts.app')->section('content');
    }

    
}
