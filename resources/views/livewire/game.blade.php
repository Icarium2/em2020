<div>
    <div class="h-24 hover:shadow-md bg-white rounded-xl items-center flex my-6">
        <div class="hidden sm:inline-block gameTime px-8 border-r w-1/6 border-gray-200">
            <div class="text-center items-center" wire:click="getAllPredictions">

                <div class="font-semibold text-sm">{{ substr($game->time,0,-3) }}</div>
                <div class="font-semibold text-sm">{{ $game->city }}</div>
                <div class="font-semibold text-sm">{{ $game->date }}</div>
            </div>
        </div>

        @if($game->awayTeam  = $game->awayTeam == 'Nordmakedonien' ? 'Nordmaked.' : $game->awayTeam)
        @endif
        @if($game->homeTeam  = $game->homeTeam == 'Nordmakedonien' ? 'Nordmaked.' : $game->homeTeam)
        @endif

        <div data-group="{{ $game->group }}" class="game flex items-center justify-around w-full sm:w-5/6 px-2 py-6">
            <div class="w-1/3 homeTeam px-0 sm:px-5 py-8 justify-end flex items-center">
                <p data-country="{{ $game->homeTeam }}" class="team font-semibold sm:text-xl px-2 sm:px-5">{{ $game->homeTeam }}</p>
                <img src="{{asset('flags/'.$game->homeTeam.'.webp') }}" class="sm:w-10 sm:h-10 h-6 w-6" />
            </div>
            <div class="w-1/3 h-full score flex justify-center items-center">
                <div class="flex flex-col">
                    <div class="homeScore px-2 sm:px-8">
                        @auth
                            <input wire:model="homeScore" disabled type="text" class="rounded-xl team text-center text-sm sm:text-xl w-10 sm:w-12" />
                        @endauth
                    </div>

                </div>
                <div class="flex flex-col">
                    <div>-</div>


                </div>
                <div class="flex flex-col">
                    <div class="awayScore px-2 sm:px-8">
                        @auth
                            <input wire:model="awayScore" disabled type="text" class="rounded-xl text-center text-sm sm:text-xl w-10 sm:w-12" />
                        @endauth
                    </div>

                </div>

            </div>
            <div class="w-1/3 awayTeam border-gray-200 sm:px-5 py-8 flex items-center">
                <img src="{{asset('flags/'.$game->awayTeam.'.webp') }}" class="sm:w-10 sm:h-10 w-6 h-6" />
                <p data-country="{{ $game->awayTeam }}" class="team font-semibold sm:text-xl px-2 sm:px-5">{{ $game->awayTeam }}</p>
            </div>
        </div>
    </div>

    {{-- @if($show)

    <div wire:target="getAllPredictions">
        <div class="h-24 hover:shadow-md bg-white rounded-xl items-center flex my-6">
            <table>
            @forelse ($results as $result)
                <tr>
                    <td>{{ $result->users->name }}</td>
                    <td>{{ $result->homeScore }} - {{ $result->awayScore }}</td>
                </tr>
            @empty
                Ingen har tippat på denna matchen än.
            @endforelse
            </table>
        </div>
    </div>
    @endif --}}
</div>
