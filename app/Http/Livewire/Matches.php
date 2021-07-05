<?php

namespace App\Http\Livewire;

use App\Models\Games;
use Livewire\Component;
use App\Models\Countries;
use Illuminate\Support\Facades\Auth;

class Matches extends Component
{

    public $games;
    public $homeScore;
    public $countries;

    protected $rules = [
        'games.homeScore' => 'required',
        'games.awayScore' => 'required',
    ];

    public function mount()
    {

        $countries = Countries::all();

        $games = Games::with([
            'homeCountry',
            'awayCountry',
            'allPredictions',
            'homeAllPredictions',
            'awayAllPredictions',
            'drawAllPredictions',
            'Prediction' => function ($user){
                $user->where('user_id', '=', Auth::id());
            }
        ])->get();

        $this->games = $games;
        $this->countries = $countries;

    }

    public function render()
    {

        return view('livewire.matches');
    }
}
