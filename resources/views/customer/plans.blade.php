<x-app-layout>
    <div class="col-span-12">
        <h2 class="font-bold text-xl">Veuillez sélectionner un plan d'abonnement</h2>
        <div class="grid grid-cols-4 gap-4">
            @if(!\App\Services\CustomerService::hasActiveSubscription())
                @foreach($plans as $plan)
                    <div class="col-span-1">
                        <div class="p-4 bg-white rounded-md">
                            <div class="card-body">
                                <h5 class="text-xl uppercase">{{ $plan->name }}</h5>
                                <p class="text-right">
                                    {{ $plan->price }}€ / mois
                                </p>
                                <p class="p-4">

                                </p>
                                <p class="text-right">
                                    <a href="{{ route('plans.show', $plan->slug) }}"
                                       class="button">Choisir</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-1">
                    <div class="p-4 bg-white rounded-md">
                        <div class="card-body">
                            Vous êtes déjà abonné
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
