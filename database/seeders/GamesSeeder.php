<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Games::insert([
            'homeTeam' => 'Turkiet',
            'awayTeam' => 'Italien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-11',
            'time' => '21:00',
            'city' => 'Rom',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Wales',
            'awayTeam' => 'Schweiz',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-12',
            'time' => ' 15:00',
            'city' => 'Baku',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Danmark',
            'awayTeam' => 'Finland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-12',
            'time' => '18:00',
            'city' => 'Köpenhamn',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'Belgien',
            'awayTeam' => 'Ryssland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-12',
            'time' => '21:00',
            'city' => 'St Petersburg',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'England',
            'awayTeam' => 'Kroatien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-13',
            'time' => '15:00',
            'city' => 'London',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'Österrike',
            'awayTeam' => 'Nordmakedonien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-13',
            'time' => '18:00',
            'city' => 'Bukarest',
            'group' => 'C'
        ]);
        Games::insert([
            'homeTeam' => 'Holland',
            'awayTeam' => 'Ukraina',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-13',
            'time' => '21:00',
            'city' => 'Amsterdam',
            'group' => 'C'

        ]);
        Games::insert([
            'homeTeam' => 'Skottland',
            'awayTeam' => 'Tjeckien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-14',
            'time' => '15:00',
            'city' => 'Glasgow',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'Polen',
            'awayTeam' => 'Slovakien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-14',
            'time' => '18:00',
            'city' => 'Dublin',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Spanien',
            'awayTeam' => 'Sverige',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-14',
            'time' => '21:00',
            'city' => 'Bilbao',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Ungern',
            'awayTeam' => 'Portugal',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-15',
            'time' => '18:00',
            'city' => 'Budapest',
            'group' => 'F'
        ]);
        Games::insert([
            'homeTeam' => 'Frankrike',
            'awayTeam' => 'Tyskland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-15',
            'time' => '21:00',
            'city' => 'München',
            'group' => 'F'
        ]);
        Games::insert([
            'homeTeam' => 'Finland',
            'awayTeam' => 'Ryssland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-16',
            'time' => '15:00',
            'city' => 'St Petersburg',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'Turkiet',
            'awayTeam' => 'Wales',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-16',
            'time' => '18:00',
            'city' => 'Baku',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Italien',
            'awayTeam' => 'Schweiz',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-16',
            'time' => '21:00',
            'city' => 'Rom',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Ukraina',
            'awayTeam' => 'Nordmakedonien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-17',
            'time' => '15:00',
            'city' => 'Bukarest',
            'group' => 'C'
        ]);
        Games::insert([
            'homeTeam' => 'Danmark',
            'awayTeam' => 'Belgien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-17',
            'time' => '18:00',
            'city' => 'Köpenhamn',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'Holland',
            'awayTeam' => 'Österrike',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-17',
            'time' => '21:00',
            'city' => 'Amsterdam',
            'group' => 'C'
        ]);
        Games::insert([
            'homeTeam' => 'Sverige',
            'awayTeam' => 'Slovakien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-18',
            'time' => '15:00',
            'city' => 'Dublin',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Kroatien',
            'awayTeam' => 'Tjeckien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-18',
            'time' => '18:00',
            'city' => 'Glasgow',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'England',
            'awayTeam' => 'Skottland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-18',
            'time' => '21:00',
            'city' => 'London',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'Ungern',
            'awayTeam' => 'Frankrike',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-19',
            'time' => '15:00',
            'city' => 'Budapest',
            'group' => 'F'
        ]);
        Games::insert([
            'homeTeam' => 'Portugal',
            'awayTeam' => 'Tyskland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-19',
            'time' => '18:00',
            'city' => 'München',
            'group' => 'F'
        ]);
        Games::insert([
            'homeTeam' => 'Spanien',
            'awayTeam' => 'Polen',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-19',
            'time' => '21:00',
            'city' => 'Bilbao',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Italien',
            'awayTeam' => 'Wales',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-20',
            'time' => '18:00',
            'city' => 'Rom',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Schweiz',
            'awayTeam' => 'Turkiet',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-20',
            'time' => '18:00',
            'city' => 'Baku',
            'group' => 'A'
        ]);
        Games::insert([
            'homeTeam' => 'Nordmakedonien',
            'awayTeam' => 'Holland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-21',
            'time' => '18:00',
            'city' => 'Amsterdam',
            'group' => 'C'
        ]);
        Games::insert([
            'homeTeam' => 'Ukraina',
            'awayTeam' => 'Österrike',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-21',
            'time' => '18:00',
            'city' => 'Bukarest',
            'group' => 'C'
        ]);
        Games::insert([
            'homeTeam' => 'Ryssland',
            'awayTeam' => 'Danmark',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-21',
            'time' => '21:00',
            'city' => 'Köpenhamn',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'Finland',
            'awayTeam' => 'Belgien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-21',
            'time' => '21:00',
            'city' => 'St Petersburg',
            'group' => 'B'
        ]);
        Games::insert([
            'homeTeam' => 'Tjeckien',
            'awayTeam' => 'England',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-22',
            'time' => '21:00',
            'city' => 'London',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'Kroatien',
            'awayTeam' => 'Skottland',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-22',
            'time' => '21:00',
            'city' => 'Glasgow',
            'group' => 'D'
        ]);
        Games::insert([
            'homeTeam' => 'Spanien',
            'awayTeam' => 'Slovakien',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-23',
            'time' => '18:00',
            'city' => 'Bilbao',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Sverige',
            'awayTeam' => 'Polen',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-23',
            'time' => '18:00',
            'city' => 'Dublin',
            'group' => 'E'
        ]);
        Games::insert([
            'homeTeam' => 'Tyskland',
            'awayTeam' => 'Ungern',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-23',
            'time' => '21:00',
            'city' => 'München',
            'group' => 'F'
        ]);
        Games::insert([
            'homeTeam' => 'Portugal',
            'awayTeam' => 'Frankrike',
            'homeScore' => 0,
            'awayScore' => 0,
            'date' => '2021-06-23',
            'time' => '21:00',
            'city' => 'Budapest',
            'group' => 'F'
        ]);
    }
}
