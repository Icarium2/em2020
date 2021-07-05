<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\CountryStats;
use Illuminate\Support\Facades\Auth;

class Questions extends Component
{
    public $countries;
    public $winner;
    public $finaleTeamHome;
    public $finaleTeamAway;
    public $goalScorer;
    public $clickGoalScorer;

    public function winner()
    {
        User::where('id', Auth::user()->id)
        ->update(['winner' => $this->winner]);
    }

    public function finaleTeamHome()
    {
        User::where('id', Auth::user()->id)
        ->update(['finaleTeamHome' => $this->finaleTeamHome]);
    }

    public function finaleTeamAway()
    {
        User::where('id', Auth::user()->id)
        ->update(['finaleTeamAway' => $this->finaleTeamAway]);
    }

    public function goalScorer($player = null)
    {
        if($player === null){
            $player = CountryStats::where('playerName', $this->goalScorer)->first();
        }else{
            $player = CountryStats::where('playerName', $player)->first();
        }

        if($player == []){
            return;
        }

        User::where('id', Auth::user()->id)
        ->update(['goalScorer' => $player->playerName]);

        $this->goalScorer = $player->playerName;
    }


    public function mount()
    {

        if (Auth::check()){
            if(Auth::user()->winner == ""){
                $currentWinner = 'none';
            }else{
                $currentWinner = Auth::user()->winner;
            }
            $this->winner = $currentWinner;
            $this->finaleTeamHome = Auth::user()->finaleTeamHome;
            $this->finaleTeamAway = Auth::user()->finaleTeamAway;
            $this->goalScorer = Auth::user()->goalScorer;
        }
    }

    public function render()
    {

        if($this->goalScorer === ""){
            $this->goalScorer = '';
        }
        return view('livewire.questions',
        [
            'players' => CountryStats::where(function ($query) {
                $query->where('playerName', 'LIKE', '%' . ucwords($this->goalScorer) . '%')
                ->orWhere('country', 'LIKE', '%' . ucwords($this->goalScorer) . '%');
            })
            ->get()
        ]);
    }
}
