<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class BrifSuccessfulPage extends Component
{
    public function mount() {
        Session::flush();
    }
    public function render()
    {
        return view('livewire.brif-successful-page');
    }
}
