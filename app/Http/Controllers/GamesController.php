<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Countries;
use Illuminate\Http\Request;
use App\Models\userPredictions;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{

    public function index()
    {
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
        $countries = Countries::orderBy('country')->get();

        if(Auth::check()){
            $userAnsweredCount = userPredictions::where('user_id', Auth::user()->id)->count();
        }else{
            $userAnsweredCount = '';
        }

        return view('index', [
            'games' => $games,
            'countries' => $countries,
            'userAnsweredCount' => $userAnsweredCount,
            'gamesCount' => $games->count()
        ]);
    }
}
