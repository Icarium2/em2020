<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Games extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeCountry()
    {
        return $this->belongsTo(Countries::class, 'homeTeam', 'country');
    }

    public function awayCountry()
    {
        return $this->belongsTo(Countries::class, 'awayTeam', 'country');
    }

    public function prediction()
    {
        return $this->belongsTo(userPredictions::class, 'id', 'game_id');
    }

    public function allPredictions()
    {
        return $this->hasMany(userPredictions::class, 'game_id');
    }
    public function homeAllPredictions()
    {
        return $this->hasMany(userPredictions::class, 'game_id')
        ->whereColumn('homeScore', '>', 'awayScore');
    }

    public function awayAllPredictions()
    {
        return $this->hasMany(userPredictions::class, 'game_id')
        ->whereColumn('homeScore', '<', 'awayScore');
    }
    public function drawAllPredictions()
    {
        return $this->hasMany(userPredictions::class, 'game_id')
        ->whereColumn('homeScore', '=', 'awayScore');
    }

    public function bets()
    {
        return $this->hasMany(userPredictions::class, 'game_id')->orderBy('game_id');
    }

    // public function betsHome($homeTeam, $gameId){
    //     return $this->belongsTo(userPredictions::class, 'id', 'game_id')
    //     ->where('game_id', $gameId)
    //     ->whereColumn('homeScore', '>', 'awayScore');
    // }
    // public function betsAway($awayTeam, $gameId){
    //     return $this->belongsTo(userPredictions::class, 'id', 'game_id')
    //     ->where('game_id', $gameId)
    //     ->whereColumn('homeScore', '<', 'awayScore');
    // }
}
