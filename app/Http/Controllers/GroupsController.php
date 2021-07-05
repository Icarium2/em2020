<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Countries;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index()
    {
        // $groups = Countries::all()->sortByDesc('points')->sortBy('group')->groupBy('group');

        $games = Games::all()->where('gameOver', 1)->sortBy('group');
        $groupName = array('A', 'B', 'C', 'D', 'E', 'F');
        $countries = Countries::all()->sortBy('group');

        $groups = [];
        foreach($countries as $country){
            $groups[$country->group][$country->country]['playedGames'] = 0;
            $groups[$country->group][$country->country]['wins'] = 0;
            $groups[$country->group][$country->country]['draws'] = 0;
            $groups[$country->group][$country->country]['loses'] = 0;
            $groups[$country->group][$country->country]['goals'] = 0;
            $groups[$country->group][$country->country]['conceded'] = 0;
            $groups[$country->group][$country->country]['difference'] = 0;
            $groups[$country->group][$country->country]['points'] = 0;


        }

        foreach($games AS $game)
        {
            $homeTeam = $groups[$game->group][$game->homeTeam];
            if($game->homeScore > $game->awayScore){
                $groups[$game->group][$game->homeTeam]['playedGames'] = $groups[$game->group][$game->homeTeam]['playedGames']+1;
                $groups[$game->group][$game->homeTeam]['points'] = $groups[$game->group][$game->homeTeam]['points']+3;
                $groups[$game->group][$game->homeTeam]['wins'] = $groups[$game->group][$game->homeTeam]['wins']+1;
                $groups[$game->group][$game->homeTeam]['goals'] = $groups[$game->group][$game->homeTeam]['goals']+$game->homeScore;
                $groups[$game->group][$game->homeTeam]['conceded'] = $groups[$game->group][$game->homeTeam]['conceded']+$game->awayScore;
                $groups[$game->group][$game->homeTeam]['difference'] = $groups[$game->group][$game->homeTeam]['difference']+($game->homeScore - $game->awayScore);

                $groups[$game->group][$game->awayTeam]['playedGames'] = $groups[$game->group][$game->awayTeam]['playedGames']+1;
                $groups[$game->group][$game->awayTeam]['loses'] = $groups[$game->group][$game->awayTeam]['loses']+1;
                $groups[$game->group][$game->awayTeam]['goals'] = $groups[$game->group][$game->awayTeam]['goals']+$game->awayScore;
                $groups[$game->group][$game->awayTeam]['conceded'] = $groups[$game->group][$game->awayTeam]['conceded']+$game->homeScore;
                $groups[$game->group][$game->awayTeam]['difference'] = $groups[$game->group][$game->awayTeam]['difference']+($game->homeScore - $game->awayScore);
            }

            if($game->homeScore < $game->awayScore){
                $groups[$game->group][$game->awayTeam]['playedGames'] = $groups[$game->group][$game->awayTeam]['playedGames']+1;
                $groups[$game->group][$game->awayTeam]['points'] = $groups[$game->group][$game->awayTeam]['points']+3;
                $groups[$game->group][$game->awayTeam]['wins'] = $groups[$game->group][$game->awayTeam]['wins']+1;
                $groups[$game->group][$game->awayTeam]['goals'] = $groups[$game->group][$game->awayTeam]['goals']+$game->awayScore;
                $groups[$game->group][$game->awayTeam]['conceded'] = $groups[$game->group][$game->awayTeam]['conceded']+$game->homeScore;
                $groups[$game->group][$game->awayTeam]['difference'] = $groups[$game->group][$game->awayTeam]['difference']+($game->awayScore - $game->homeScore);

                $groups[$game->group][$game->homeTeam]['playedGames'] = $groups[$game->group][$game->homeTeam]['playedGames']+1;
                $groups[$game->group][$game->homeTeam]['loses'] = $groups[$game->group][$game->homeTeam]['loses']+1;
                $groups[$game->group][$game->homeTeam]['goals'] = $groups[$game->group][$game->homeTeam]['goals']+$game->homeScore;
                $groups[$game->group][$game->homeTeam]['conceded'] = $groups[$game->group][$game->homeTeam]['conceded']+$game->awayScore;
                $groups[$game->group][$game->homeTeam]['difference'] = $groups[$game->group][$game->homeTeam]['difference']+($game->awayScore - $game->homeScore);
            }

            if($game->homeScore == $game->awayScore){
                $groups[$game->group][$game->homeTeam]['playedGames'] = $groups[$game->group][$game->homeTeam]['playedGames']+1;
                $groups[$game->group][$game->homeTeam]['draws'] = $groups[$game->group][$game->homeTeam]['draws']+1;
                $groups[$game->group][$game->homeTeam]['goals'] = $groups[$game->group][$game->homeTeam]['goals']+$game->homeScore;
                $groups[$game->group][$game->homeTeam]['conceded'] = $groups[$game->group][$game->homeTeam]['conceded']+$game->awayScore;
                $groups[$game->group][$game->homeTeam]['points'] = $groups[$game->group][$game->homeTeam]['points']+1;
                $groups[$game->group][$game->homeTeam]['difference'] = $groups[$game->group][$game->homeTeam]['difference']+($game->homeScore - $game->awayScore);

                $groups[$game->group][$game->awayTeam]['playedGames'] = $groups[$game->group][$game->awayTeam]['playedGames']+1;
                $groups[$game->group][$game->awayTeam]['draws'] = $groups[$game->group][$game->awayTeam]['draws']+1;
                $groups[$game->group][$game->awayTeam]['goals'] = $groups[$game->group][$game->awayTeam]['goals']+$game->awayScore;
                $groups[$game->group][$game->awayTeam]['conceded'] = $groups[$game->group][$game->awayTeam]['conceded']+$game->homeScore;
                $groups[$game->group][$game->awayTeam]['points'] = $groups[$game->group][$game->awayTeam]['points']+1;
                $groups[$game->group][$game->awayTeam]['difference'] = $groups[$game->group][$game->awayTeam]['difference']+($game->homeScore - $game->awayScore);
            }

        }

        foreach($groupName as $name){
            foreach($groups[$name] as $country => $stats){
                $groups[$name][$country]['difference'] = $stats['goals'] - $stats['conceded'];

            }
        }

        foreach($groupName as $name){
            array_multisort(array_map(function($element) {
                return $element['points'];
            }, $groups[$name]));
        }

        foreach($groupName as $name){
            array_multisort(
                array_column($groups[$name], 'points'), SORT_DESC,
                array_column($groups[$name], 'difference'), SORT_DESC,
                $groups[$name]
            );
        }

        return view('groups', [
            'groups' => $groups
        ]);
    }
}
