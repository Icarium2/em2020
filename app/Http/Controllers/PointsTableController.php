<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Games;
use Illuminate\Http\Request;
use App\Models\userPredictions;
use Illuminate\Support\Facades\DB;

class PointsTableController extends Controller
{

    public function index()
    {

        $users = User::where('active', TRUE)->orderBy('points', 'DESC')->get();

        foreach($users as $user){

            $fivers = DB::table('user_predictions')
            ->join('games', 'user_predictions.game_id', '=', 'games.id')
            ->where([
                ['user_predictions.user_id', '=', $user->id],
                ['games.homeScore', '=', 'user_predictions.homeScore'],
                ['games.awayScore', '=', 'user_predictions.awayScore']
            ])
            ->select(
                'games.id as game_id',
                'games.homeScore',
                'games.awayScore',
                'user_predictions.homeScore as predictionHome',
                'user_predictions.awayScore as predictionAway'
                )
            ->get();

            // dd($fivers);
        }


        return view('pointsTable', [
            'users' => $users
        ]);
    }

    public function gatheredPoints()
    {
        $games = Games::with(['homeCountry', 'awayCountry'])->orderBy('id')->get();
        $users = DB::table('users')
        ->join('user_predictions', 'users.id', '=', 'user_predictions.user_id')
        ->join('games', 'user_predictions.game_id', '=', 'games.id')
        ->where('users.active', TRUE)
        ->select('users.name',
        'user_predictions.homeScore as predictionHome',
        'user_predictions.awayScore as predictionAway',
        'games.*')
        ->get();

        $new_user_array = [];
        $user_merge_array = [];

        foreach($users as $user){
            $new_user_array[$user->name][$user->id] =
            [
                'predictionHome' => $user->predictionHome,
                'predictionAway' => $user->predictionAway,
                'homeScore' => $user->homeScore,
                'awayScore' => $user->awayScore
            ];
        }

        return view('gatheredPoints',
        [
            'users' => $new_user_array,
            'games' => $games
        ]
        );
    }
}
