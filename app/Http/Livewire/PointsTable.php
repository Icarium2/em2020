<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PointsTable extends Component
{

    public $users;

    public function render()
    {
        return view('livewire.points-table');
    }
}
