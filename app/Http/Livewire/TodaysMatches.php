<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Games;
use Livewire\Component;
use App\Models\Countries;

class TodaysMatches extends Component
{
    public $games;
    public $updateHomeScore;
    public $updateAwayScore;

    public function savePoints($id)
    {
        $game = Games::where('id', $id)->first();
        if($game->gameOver == null){
            foreach($game->bets as $userPrediction){
                if($userPrediction->homeScore == $game->homeScore && $userPrediction->awayScore == $game->awayScore){
                    $points = 5;
                }else if($game->homeScore > $game->awayScore && $userPrediction->homeScore > $userPrediction->awayScore){
                    $points = 2;
                }else if($game->homeScore < $game->awayScore && $userPrediction->homeScore < $userPrediction->awayScore){
                    $points = 2;
                }else if($game->homeScore === $game->awayScore && $userPrediction->homeScore === $userPrediction->awayScore){
                    $points = 2;
                }else{
                    $points = 0;
                }
                User::where('id', $userPrediction->users->id)
                ->update(['points' => $userPrediction->users->points + $points]);
            }
            Games::where('id', $game->id)
            ->update(['gameOver' => true]);

            $homeTeam = Countries::where('country', $game->homeTeam)->first();
            $awayTeam = Countries::where('country', $game->awayTeam)->first();

            if($game->homeScore > $game->awayScore){
                $winner = $game->homeTeam;
                $loser = $game->awayTeam;
                $wins = $homeTeam->wins+1;
                $winnerPoints = 3;

            }
            if($game->homeScore < $game->awayScore){
                $winner = $game->awayTeam;
                $loser = $game->homeTeam;
                $winsAway = $game->$awayTeam+1;
                $winnerPoints = 3;
            }
            if($game->homeScore == $game->awayScore){
                $winnerPoints = 1;
            }

            if($game->homeScore != $game->awayScore){
                $winnerTeam = Countries::where('country', $winner)->first();
                $loserTeam = Countries::where('country', $loser)->first();


                Countries::where('country', $winner)
                ->update([
                    'playedGames' => $winnerTeam->playedGames+1,
                    'wins' => $wins,
                    'goals' => $winnerTeam->goals+$game->homeScore,
                    'conceded' => $winnerTeam->conceded+$game->awayScore,
                    'points' => $winnerTeam->points+$winnerPoints
                ]);

                Countries::where('country', $loser)
                ->update([
                    'playedGames' => $awayTeam->playedGames+1,
                    'loses' => $wins,
                    'goals' => $awayTeam->goals+$game->awayScore,
                    'conceded' => $awayTeam->conceded+$game->homeScore,
                ]);
            }else{
                Countries::where('country', $game->homeTeam)
                ->update([
                    'playedGames' => $homeTeam->playedGames+1,
                    'draws' => $homeTeam->draws+1,
                    'goals' => $homeTeam->goals+$game->homeScore,
                    'conceded' => $homeTeam->conceded+$game->awayScore,
                    'points' => $homeTeam->points+$winnerPoints
                ]);

                Countries::where('country', $game->awayTeam)
                ->update([
                    'playedGames' => $awayTeam->playedGames+1,
                    'draws' => $awayTeam->draws+1,
                    'goals' => $awayTeam->goals+$game->awayScore,
                    'conceded' => $awayTeam->conceded+$game->homeScore,
                    'points' => $homeTeam->points+$winnerPoints
                ]);
            }

        }
    }

    public function updateHomeScore($id)
    {
        Games::where('id', $id)
        ->update(['homeScore' => $this->updateHomeScore]);
    }

    public function updateAwayScore($id)
    {
        Games::where('id', $id)
        ->update(['awayScore' => $this->updateAwayScore]);
    }

    public function render()
    {

        $games = Games::where('date', '=', date('Y-m-d'))->orderBy('id', 'DESC')->get();
        return view('livewire.todays-matches',
    [
        'games' => $games
    ]);
    }
}
