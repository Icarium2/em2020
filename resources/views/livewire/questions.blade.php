<div>
    @auth
        <div class="h-36 hover:shadow-md bg-white rounded-xl items-center flex flex-col my-6 py-6">
            <div class="font-semibold pb-4 px-8">Vilket lag vinner EM2021?</div>
            <div>
                <select wire:model="winner" class="border border-gray-300 rounded-xl py-2 pl-10">
                    <option value="disabled" {{ ($winner == "none" ? ' selected' : '') }}>Välj ett land</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->country }}"
                        {{ ($winner == $country->country ? ' selected' : '') }}
                        >{{ $country->country }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="w-full h-36 hover:shadow-md bg-white rounded-xl items-center flex flex-col my-6 py-6">
            <div class="pb-4 px-8 font-semibold">Vilka lag möts i final?</div>
            <div class="flex flex-row">
                <select wire:model="finaleTeamHome" class="border border-gray-300 rounded-xl px-4 py-2">
                    <option value="disabled" disabled>Välj ett land</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->country }}"  {{ ($finaleTeamHome == $country->country ? ' selected' : '') }}>{{ $country->country }}</option>
                    @endforeach
                </select>
                <div class="px-4"> - </div>
                <select wire:model="finaleTeamAway" class="border border-gray-300 rounded-xl ml-8 px-4 py-2">
                    <option value="disabled" disabled>Välj ett land</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->country}}"  {{ ($finaleTeamAway == $country->country ? ' selected' : '') }}>{{ $country->country }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="h-auto w-full hover:shadow-md bg-white rounded-xl items-center px-6 py-6 flex my-6">
            <div class="flex-1 flex items-center justify-center lg:ml-6 lg:justify-end mb-8">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Sök efter spelare eller land...</label>
                    <div class="relative">
                        <div class="font-semibold">Vem vinner skytteligan?</div>
                        {{-- <div class="aboslute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clid-rule="evenodd" />
                            </svg>
                        </div> --}}
                        <input id="search" wire:model.debounce.300ms="goalScorer"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300
                        focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Sök efter spelare eller land..." type="search" autocomplete="off">
                        @if (strlen($goalScorer) > 2)
                            <ul class="absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">
                                @forelse ($players as $player)
                                    <li wire:click.prevent="goalScorer('{{$player->playerName}}')" wire:model="goalScorer">
                                        <a href="#" class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                            <img class="w-10 h-10 rounded-xl" src="{{asset('/images/countries/'.$player->country.'/'.$player->playerName.'.png')}}" />
                                            <div class="ml-4 leading-tight">
                                                <div class="font-semibold">{{ $player->playerName }} </div>
                                                <div class="text-gray-600">{{ $player->country }}</div>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <li class="px-4 py-4">Ingen spelare hittades på "{{ $goalScorer }}"</li>
                                @endforelse
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
