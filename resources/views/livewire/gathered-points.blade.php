<div>
    <table>
        <thead>
            <th>Namn</th>
            @forelse ($games as $game)
            <th class="mx-6 w-full">
                <img src="{{asset('flags/'.$game->homeTeam.'.webp') }}" class="h-4 w-4" />
                <img src="{{asset('flags/'.$game->awayTeam.'.webp') }}" class="h-4 w-4" />
            </th>
            @empty

            @endforelse
        </thead>
            <td>{{ $user->user->name ?? ''}}</td>

        @forelse ($users as $user => $stats)
        {{-- {{dd($users)}} --}}
            <tr>
                {{-- {{dd($user)}} --}}
                <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user}}</td>
                @forelse ($stats as $game)

                    <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light"></td>
                    <td>{{ $game['predictionHome'] }} - {{ $game['predictionAway'] }}</td>
                    {{-- @if ($bets->homeScore == $game->homeScore && $bets->awayScore == $game->awayScore)
                        5
                    @elseif ($game->homeScore > $game->awayScore && $bets->homeScore > $bets->awayScore)
                        2
                    @elseif ($game->homeScore < $game->awayScore && $bets->homeScore < $bets->awayScore)
                        2
                    @elseif ($game->homeScore === $game->awayScore && $bets->homeScore === $bets->awayScore)
                        2
                    @else
                        0
                    @endif --}}
                    @empty

                    @endforelse
            </tr>
        @empty

        @endforelse
</table>
</div>
