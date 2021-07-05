<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::insert([
            'group' => 'A',
            'country' => 'Turkiet',
            'shortName' => 'TUR',
        ]);

        Countries::insert([
            'group' => 'A',
            'country' => 'Schweiz',
            'shortName' => 'SUI',
        ]);
        Countries::insert([
            'group' => 'A',
            'country' => 'Italien',
            'shortName' => 'ITA',
        ]);
        Countries::insert([
            'group' => 'A',
            'country' => 'Wales',
            'shortName' => 'WAL',
        ]);
        Countries::insert([
            'group' => 'B',
            'country' => 'Ryssland',
            'shortName' => 'RUS',
        ]);
        Countries::insert([
            'group' => 'B',
            'country' => 'Belgien',
            'shortName' => 'BEL',
        ]);
        Countries::insert([
            'group' => 'B',
            'country' => 'Danmark',
            'shortName' => 'DAN',
        ]);
        Countries::insert([
            'group' => 'B',
            'country' => 'Finland',
            'shortName' => 'FIN',
        ]);
        Countries::insert([
            'group' => 'C',
            'country' => 'Österrike',
            'shortName' => 'AUT',
        ]);
        Countries::insert([
            'group' => 'C',
            'country' => 'Holland',
            'shortName' => 'NED',
        ]);
        Countries::insert([
            'group' => 'C',
            'country' => 'Nordmakedonien',
            'shortName' => 'MKD',
        ]);
        Countries::insert([
            'group' => 'C',
            'country' => 'Ukraina',
            'shortName' => 'UKR',
        ]);
        Countries::insert([
            'group' => 'D',
            'country' => 'Tjeckien',
            'shortName' => 'CZE',
        ]);
        Countries::insert([
            'group' => 'D',
            'country' => 'Kroatien',
            'shortName' => 'KRO',
        ]);
        Countries::insert([
            'group' => 'D',
            'country' => 'Skottland',
            'shortName' => 'SCO',
        ]);
        Countries::insert([
            'group' => 'D',
            'country' => 'England',
            'shortName' => 'ENG',
        ]);
        Countries::insert([
            'group' => 'E',
            'country' => 'Sverige',
            'shortName' => 'SWE',
        ]);
        Countries::insert([
            'group' => 'E',
            'country' => 'Polen',
            'shortName' => 'POL',
        ]);
        Countries::insert([
            'group' => 'E',
            'country' => 'Spanien',
            'shortName' => 'ESP',
        ]);
        Countries::insert([
            'group' => 'E',
            'country' => 'Slovakien',
            'shortName' => 'SVK',
        ]);
        Countries::insert([
            'group' => 'F',
            'country' => 'Tyskland',
            'shortName' => 'GER',
        ]);
        Countries::insert([
            'group' => 'F',
            'country' => 'Frankrike',
            'shortName' => 'FRA',
        ]);
        Countries::insert([
            'group' => 'F',
            'country' => 'Portugal',
            'shortName' => 'POR',
        ]);
        Countries::insert([
            'group' => 'F',
            'country' => 'Ungern',
            'shortName' => 'HUN',
        ]);

    }
}
