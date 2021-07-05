<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Games;
use Livewire\Component;
use App\Models\userPredictions;
use Illuminate\Support\Facades\Auth;

class Game extends Component
{
    public $game;
    public $homeScore;
    public $awayScore;
    public $results;
    public $show = false;
    public $countrySelected;
    public $userAnsweredCount;


    public function getAllPredictions()
    {
        $this->show = !$this->show;
        $results = userPredictions::with(['users'])
        ->where('game_id', $this->game->id)
        ->get();
        $this->results = $results;
    }

    public function updateResult()
    {
        $homeScore = $this->homeScore == "" ? 0 : $this->homeScore;
        $awayScore = $this->awayScore == "" ? 0 :  $this->awayScore;
        $game = $this->game;

        userPredictions::updateOrCreate(
            ['game_id' => $game->id, 'user_id' => Auth::id()],
            ['homeScore' => $homeScore, 'awayScore' => $awayScore]
        );
        $this->emit('refreshUserAnswersCount');

        session()->flash('success_message', 'Resultaten uppdaterat');
    }

    public function mount($game)
    {
        $this->homeScore = $game->Prediction->homeScore ?? '';
        $this->awayScore = $game->Prediction->awayScore ?? '';
    }

    public function render()
    {
        if($this->countrySelected != null){
            return view('livewire.game',
            [
            'games' => Games::where(function ($query) {
                $query->where('homeTeam', '=', $this->countrySelected)
                ->orWhere('awayTeam', '=', $this->countrySelected);
            })->get(),
            ]);
        }else{
            return view('livewire.game');
        }
    }
}
