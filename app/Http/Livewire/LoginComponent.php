<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
   
    public function render()
    {
        return view('livewire.login-component')->extends('layouts.app')->section('content');
    }
}
