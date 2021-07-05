<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPredictions;
use Illuminate\Support\Facades\Auth;

class UserAnswersCount extends Component
{
    public $userAnsweredCount;
    public $gamesCount;
    public $count;
    protected $listeners = ['refreshUserAnswersCount' => 'mount'];

    public function mount()
    {
        $this->userAnsweredCount = userPredictions::where('user_id', Auth::user()->id)->count();
    }

    public function render()
    {
        return view('livewire.user-answers-count');
    }
}
