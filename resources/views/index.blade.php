<x-app-layout>
    @auth
        <livewire:user-answers-count :userAnsweredCount="$userAnsweredCount" :gamesCount="$gamesCount" />
    @endauth
        <livewire:dropdowns />
        @foreach($games as $game)
            <livewire:game :game="$game" />
        @endforeach
        <livewire:questions :countries="$countries"/>

    <script>
        let selectedTeam = document.querySelector('#country');

        selectedTeam.addEventListener('change', (event) => {
           let teams = document.querySelectorAll(".game");
           document.querySelector('#group').value = 'all';
           if(event.target.value === 'all'){
              document.querySelectorAll('.game').forEach(team => {
                team.parentElement.style.display = '';
              });
           }else{
            teams.forEach(team => {
                if(
                team.querySelector(".homeTeam p").dataset.country !== event.target.value
                &&
                team.querySelector(".awayTeam p").dataset.country !== event.target.value
                ){
                    team.parentElement.style.display = 'none';
                }else{
                    team.parentElement.style.display = '';
                }
            });
           }
        });

        let selectedGroups = document.querySelector('#group');
        selectedGroups.addEventListener('change', (event) => {
            document.querySelector('#country').value = 'all';
            let groups = document.querySelectorAll(".game");
            groups.forEach(group => {
                if(group.parentElement.querySelector(`[data-group="${event.target.value}"`) === null){
                    group.parentElement.style.display = 'none';
                }else{
                    group.parentElement.style.display = '';
                }
            });
        });

    </script>


</x-app-layout>
