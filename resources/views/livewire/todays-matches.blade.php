<div>
    @forelse ($games as $game)

        @livewire('each-game-today', ['game' => $game], key($game->id))

    @empty
        Inga matcher spelas idag.
    @endforelse
</div>

