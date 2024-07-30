<x-app-layout>
    <h2 class="text-purple-800 font-semibold uppercase p-4 border-b-2 border-purple-800 mb-4">
        {{ __('Mon compte client') }}
    </h2>
    <div class="grid grid-cols-4 gap-4 mt-4">
        @if($activeSubscriptions->count() > 0)
            @foreach($activeSubscriptions as $activeSubscription)
                <div class="col-span-4 lg:col-span-1">
                    <div class="rounded bg-white p-4">
                        <h2 class="font-semibold py-4 text-xl">{{$activeSubscription->name}}</h2>
                        <p>
                            {{\App\Services\SubscriptionService::getPlan($activeSubscription->stripe_price)->price}} € /
                            mois
                        </p>
                        @if(is_null($activeSubscription->ends_at))
                            <p class="text-right">
                            <form class="flex flex-row justify-between" method="POST"
                                  action="{{ route('customer.subscription.cancel',$activeSubscription->name) }}">
                                @csrf
                                <span class="text-green-400 font-semibold">
                                    Actif
                                </span>
                                <button class="button" type="submit"
                                        onclick="return confirm('Souhaitez-vous réellement résilier votre abonnement ?');">
                                    Résilier mon abonnement
                                </button>
                            </form>
                            </p>
                        @else
                            <p class="text-left text-sm text-gray-400 pt-4">
                                résilié : actif jusqu'au {{$activeSubscription->ends_at->format('d-M-Y')}}
                            </p>
                            <p class="text-right">
                            <form class="text-right pt-4" method="POST"
                                  action="{{ route('customer.subscription.resume',$activeSubscription->name) }}">
                                @csrf
                                <button class="button" type="submit"
                                        onclick="return confirm('Souhaitez-vous réellement réactiver votre abonnement ?');">
                                    Réactiver mon abonnement
                                </button>
                            </form>
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>
                Vous n'êtes pas encore abonné
            </p>
            <p>
                <a class="button" href="{{route('customer.plans')}}">
                    Choisir un abonnement
                </a>
            </p>
        @endif
    </div>

    <h2 class="text-purple-800 font-semibold uppercase p-4 border-b-2 border-purple-800 mb-4">
        {{ __('Mes réservations') }}
    </h2>
    <div>
        @if(auth()->user()->subscriptions()->active()->get()->count() > 0)
            <a class="button" href="{{route('customer.bikeModels')}}">
                Réserver un vélo
            </a>
        @endif
        <div class="grid grid-cols-4 gap-4 mt-8">
            @foreach(\App\Services\RentalService::getRentalsForCustomer() as $rental)
                <div class="col-span-4 lg:col-span-1">
                    <div class="rounded bg-white p-4 prose">
                        <div class="flex flex-row justify-end">
                            <form method="POST" action="{{ route('customer.rental.destroy', $rental->id) }}">
                                @csrf
                                <x-dropdown-link :href="route('customer.rental.destroy', $rental->id)"
                                                 onclick="event.preventDefault();if (confirm('Souhaitez-vous réellement annuler cette location?')) {this.closest('form').submit();return false;}">
                                    {{ __('Cancel') }}
                                </x-dropdown-link>
                                {{--                                todo: annuler une annulation : POST/GET request error--}}
                            </form>
                        </div>


                        @if(!empty($rental->image))
                            <img src="{{asset('storage/'. $rental->image)}}" alt="{{$rental->name}}"
                                 class="w-80 mx-auto">
                        @endif
                        <div class="pl-4 font-sans text-center text-xl">{{$rental->trademark_name}}</div>
                        <div class="pl-4 font-sans text-center text-xl">{{$rental->model_name}}</div>
                        <div class="pl-4 font-mono text-center text-xl">{{$rental->serial_number}}</div>
                        <div class="font-semibold text-center pt-4">
                            <span class="text-blue-400">{{date('d-m-Y', strtotime($rental->start_date))}}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                            <span class="text-blue-400">{{date('d-m-Y', strtotime($rental->end_date))}}</span>
                        </div>
                        @if($rental->extra_price > 0)
                            <div class="font-semibold text-right">
                                <div class="bg-blue-400 text-white text-xs px-2 py-1 rounded inline">
                                    <i class="fa-solid fa-plus"></i> {{$rental->extra_price}}€
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
