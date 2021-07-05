<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Countries;

class Dropdowns extends Component
{

    public $country;
    public $countrySelect;

    public function mount()
    {
    }

    public function render()
    {

        $countries = Countries::orderBy('country')->get();
        return view('livewire.dropdowns',
    [
        'countries' => $countries,
    ]);
    }
}
