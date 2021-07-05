<div>
    <div class="hover:shadow-md bg-white rounded-xl items-center flex flex-col my-6">
        <div class="flex justify-center w-full h-24">
            <div data-group="{{ $game->group }}" class="game flex items-center justify-around w-full sm:w-5/6 px-2 py-6">
                <div class="w-1/3 homeTeam px-0 sm:px-5 py-8 justify-end flex items-center">
                    <p data-country="{{ $game->homeTeam }}" class="team sm:text-2xl text-xl px-2 sm:px-5">{{ $game->homeTeam }}</p>
                    <img src="{{asset('flags/'.$game->homeTeam.'.webp') }}" class="sm:w-10 sm:h-10 h-6 w-6" />
                </div>
                <div class="w-1/3 h-full score flex justify-center items-center">
                    <div class="flex flex-col">
                        <div class="homeScore text-xl sm:text-2xl px-2 sm:px-8">
                            @auth
                                @if(Auth::user()->userlevel === 'admin')
                                <input wire:model="updateHomeScore" wire:change="updateHomeScore({{$game->id}})" type="text" class="rounded-xl team text-center text-sm sm:text-xl w-10 sm:w-12" />
                                @else
                                    {{ $game->homeScore }}
                                @endif
                            @endauth
                        </div>

                    </div>
                    <div class="flex flex-col">
                        <div>-</div>
                    </div>
                    <div class="flex flex-col">
                        <div class="awayScore text-xl sm:text-2xl px-2 sm:px-8">
                            @auth
                                @if(Auth::user()->userlevel === 'admin')
                                <input wire:model="updateAwayScore" wire:change="updateAwayScore({{$game->id}})" type="text" class="rounded-xl team text-center text-sm sm:text-xl w-10 sm:w-12" />
                                @else
                                    {{ $game->awayScore }}
                                @endif
                            @endauth
                        </div>
                    </div>


                </div>
                <div class="w-1/3 awayTeam border-gray-200 sm:px-5 py-8 flex items-center">
                    <img src="{{asset('flags/'.$game->awayTeam.'.webp') }}" class="sm:w-10 sm:h-10 w-6 h-6" />
                    <p data-country="{{ $game->awayTeam }}" class="team text-xl sm:text-2xl px-2 sm:px-8">{{ $game->awayTeam }}</p>
                </div>
            </div>
        </div>
        @auth
            @if (Auth::user()->userlevel === 'admin' && $game->gameOver == null)
                <input type="button" class="button bg-red-400 px-2 py-2 rounded-md" wire:click="savePoints({{$game->id}})" value="Avsluta matchen"
                onclick="confirm('Är du säker på att du vill avsluta matchen och ge poäng?') || event.stopImmediatePropagation()"
                />
            @endif
        @endauth

        @if($show)

        <svg xmlns="http://www.w3.org/2000/svg" wire:click="$set('show', false)" class="h-6 w-6 m-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
          </svg>

            <div class="w-full flex flex-col items-center justify-center mb-4">
                <table class="w-full text-left m-4" style="border-collapse:collapse">
                    <thead>
                        <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Namn</th>
                        <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Resultat</th>
                        <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Poäng</th>
                    </thead>
                    <tbody>
                        @forelse ($game->bets as $userPrediction)
                            @if ($userPrediction->users->active === TRUE)
                                <tr>
                                    <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{ $userPrediction->users->name ?? '' }}</td>
                                    <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                                        {{ $userPrediction->homeScore }}
                                        -
                                        {{ $userPrediction->awayScore }}
                                        (
                                        @if ($userPrediction->homeScore == $game->homeScore && $userPrediction->awayScore == $game->awayScore)
                                            5
                                        @elseif ($game->homeScore > $game->awayScore && $userPrediction->homeScore > $userPrediction->awayScore)
                                            2
                                        @elseif ($game->homeScore < $game->awayScore && $userPrediction->homeScore < $userPrediction->awayScore)
                                            2
                                        @elseif ($game->homeScore === $game->awayScore && $userPrediction->homeScore === $userPrediction->awayScore)
                                            2
                                        @else
                                            0
                                        @endif
                                        )
                                    </td>
                                    <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{ $userPrediction->users->points ?? 0 }}</td>
                                </tr>
                            @endif
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
        <svg wire:click="$set('show', true)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
          </svg>
        @endif
    </div>

</div>
