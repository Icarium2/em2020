<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $payed;
    public $active = false;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function payed($userId){
        $user = User::find($userId);
        $user->active = !$user->active;
        $user->save();
    }


    public function render()
    {


        return view('livewire.users',
        [

            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
            })->get()
            // ->where('active', $this->active)
        ]);
    }
}
