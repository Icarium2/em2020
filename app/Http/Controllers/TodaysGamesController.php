<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class TodaysGamesController extends Controller
{

    public function index()
    {
        $games = Games::with(['bets', 'homeAllPredictions', 'awayAllPredictions'])->where('date', '=', date('Y-m-d'))->orderBy('id', 'ASC')->get();
        return view('todaysGames',
    [
        'games' => $games
    ]);
    }
}
