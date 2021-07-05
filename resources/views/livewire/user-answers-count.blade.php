<div>
    <div class="bg-green-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-4 shadow-md" role="alert">
        <div class="flex">
            <div>
                {{ $count }}
                <p class="text-sm">Du kan ändra dina resultat fram till och med 11/06 20:00 </p>
                <p class="text-sm font-semibold">Du har svarat på {{ $userAnsweredCount }} av {{ $gamesCount }} resultat.</p>
                @if(Auth::user()->active === FALSE)
                    <p class="text-sm font-semibold" style="color: red;">Du har ännu inte betalt till Joakim Bilger.</p>
                @endif
            </div>
        </div>
    </div>
</div>
