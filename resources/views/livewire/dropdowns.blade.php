<div class="filters flex space-x-6 justify-center">
    <div class="w-1/2">
        <select wire:model="countrySelect" name="country" id="country" class="w-full border-none rounded-xl px-4 py-2">
            <option value="all" selected>Alla länder</option>
            @foreach ($countries as $country)
                <option value="{{ $country->country }}">{{ $country->country }}</option>
            @endforeach
        </select>
    </div>
    <div class="w-1/2">
        <select name="group" id="group" class="w-full border-none rounded-xl px-4 py-2">
            <option value="all">Alla grupper</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>

        </select>
    </div>
</div>
