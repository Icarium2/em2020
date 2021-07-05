<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GatheredPoints extends Component
{

    public $users;
    public $games;

    public function render()
    {
        return view('livewire.gathered-points');
    }
}
