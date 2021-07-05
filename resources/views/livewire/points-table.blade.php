<div>
    <table class="text-left m-4" style="border-collapse:collapse">
        <thead>
            <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Namn</th>
            <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Poäng</th>
            <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Final</th>
            <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Vinnare</th>
            <th class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">Skytteligan</th>
        </thead>
        <tbody>
            @forelse ($users as $user)
              <tr>
                  <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user->name}}</td>
                  <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user->points ?? 0}}</td>
                  <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user->finaleTeamHome}} - {{$user->finaleTeamAway}}</td>
                  <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user->winner}}</td>
                  <td class="py-4 px-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">{{$user->goalScorer}}</td>
              </tr>
            @empty

            @endforelse
        </tbody>
    <table>
</div>
