<x-guest-layout>
    <!--Texte d'introduction-->
    @section('content')
        <!--Bannière pub-->
        <div class="bg-[url('/resources/images/Banner.jpg')] bg-center  h-auto text-white py-4 px-10 object-fill">
            <div class="md:w-1/2">
                <p class="font-bold text-sm uppercase">Gamme variée et adaptée à chacun</p>
                <p class="text-3xl font-bold">Marques de qualités</p>
                <p class="text-2xl mb-10 leading-none">Abonnement abordable</p>
                <a href="{{route('contact')}}" class="bg-indigo-500 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contactez-nous</a>
            </div>
        </div>
        <!--Texte d'introduction-->
        <div class="flex flex-row flex-wrap justify-center p-9 py-3 h-full m-4 border-solid border-4">

            <div class="flex flex-row border-none justify-items-center h-full ">
                <div
                    class=" flex flex-row flex-wrap p-5 h-auto m-4 border-solid border-4 bg-gray-100 justify-items-center">
                    <div
                        class="bg-[url('/resources/images/friendly.jpg')] h-5/5 bg-cover bg-no-repeat w-auto lg:w-1/3">
                    </div>
                    <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                        <div class="flex flex-col mb-10 lg:items-start jsutify-items-end">
                            <div class="flex-grow">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{__('app.about')}}</h1>
                                <p class="leading-relaxed text-base w-50">{{__('app.welcome_message')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <!--Plan d'abonnement-->

        @if(auth()->user() == null || (!auth()->user()->subscriptions() && !auth()->user()->subscribed('Confort') && !auth()->user()->subscribed('Premium')))
            <section class="text-gray-700 body-font overflow-hidden border-t">
                <div class="container px-5 py-24 mx-auto flex flex-wrap">
                    <div class="lg:w-1/4 mt-48 hidden lg:block">
                        <div
                            class="mt-px border-t border-gray-300 border-b border-l rounded-tl-lg rounded-bl-lg overflow-hidden">
                            <label
                                class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start">
                                {{__('app.available_models')}}
                            </label>
                            <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-center">
                                {{__('app.city_bike')}}
                            </p>
                            <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-center -mt-px">
                                {{__('app.mountain_bike')}}
                            </p>
                            <p class="text-gray-900 h-12 text-center px-4 flex items-center justify-center">
                                {{__('app.foldable_bike')}}
                            </p>
                            <p class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-center -mt-px">
                                {{__('app.electric_bike')}}
                            </p>
                            <label class="text-gray-900 h-12 text-center px-4 flex items-center justify-start">Durée max
                                de
                                location:</label>
                            <label
                                class="bg-gray-100 text-gray-900 h-12 text-center px-4 flex items-center justify-start -mt-px">Location:</label>
                        </div>
                    </div>
                    <div class="flex lg:w-3/4 w-full flex-wrap lg:border border-gray-300 rounded-lg">
                        <div
                            class="lg:w-1/3 lg:mt-px w-full mb-10 lg:mb-0 border-2 border-gray-300 lg:border-none rounded-lg lg:rounded-none">
                            <div class="px-2 text-center h-48 flex flex-col items-center justify-center">
                                <h3 class="tracking-widest uppercase">{{__('app.basic')}}</h3>
                                <h2 class="text-5xl text-gray-900 font-medium flex items-center justify-center leading-none mb-4 mt-2">
                                    €5
                                    <span class="text-gray-600 text-base ml-1">/mois</span>
                                </h2>
                                <span class="text-sm text-gray-600">60€/an</span>
                            </div>
                            <p class="bg-gray-100 text-gray-600 h-12 text-center px-2 flex items-center -mt-px justify-center border-t border-gray-300"></p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.city_bike')}}</span>
                            </p>
                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.mountain_bike')}}</span>
                            </p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2.2" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path d="M18 6L6 18M6 6l12 12"></path>
                                </svg>
                            </p>

                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2.2" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path d="M18 6L6 18M6 6l12 12"></path>
                                </svg>
                            </p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">1 semaine</p>
                            <div class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                                Caution
                                + Prix en fonction du vélo choisi x le nombre de jour de location
                            </div>

                            <div class="border-t border-gray-300 p-6 text-center rounded-bl-lg">
                                @if(auth()->check())
                                    <a href="{{'/plans/basique'}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        Choisir
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{route('customer.register')}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        S'inscrire
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <!--todo changer couleur des boutons indigo-->
                        <div
                            class="lg:w-1/3 lg:-mt-px w-full mb-10 lg:mb-0 border-2 rounded-lg border-amber-500 relative">
                        <span
                            class="bg-amber-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
                            <div class="px-2 text-center h-48 flex flex-col items-center justify-center">
                                <h3 class="tracking-widest uppercase">{{__('app.comfort')}}</h3>
                                <h2 class="text-5xl text-gray-900 font-medium flex items-center justify-center leading-none mb-4 mt-2">
                                    €10
                                    <span class="text-gray-600 text-base ml-1">/mois</span>
                                </h2>
                                <span class="text-sm text-gray-600">120€/an</span>
                            </div>
                            <p class="bg-gray-100 text-gray-600 h-12 text-center px-2 flex items-center -mt-px justify-center border-t border-gray-300"></p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.city_bike')}}</span>
                            </p>
                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.mountain_bike')}}</span>
                            </p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.foldable_bike')}}</span>
                            </p>

                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path d="M18 6L6 18M6 6l12 12"></path>
                                </svg>
                                <span class="lg:hidden pl-2">{{__('app.electric_bike')}}</span>
                            </p>

                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">6 mois</p>
                            <div class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                                Caution
                                + Prix en fonction du vélo choisi x le nombre de jour de location
                            </div>
                            <div class="p-6 text-center border-t border-gray-300">
                                @if(auth()->check())
                                    <a href="{{'/plans/confort'}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        Choisir
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{route('customer.register')}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 opacity-75 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        S'inscrire
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div
                            class="lg:w-1/3 w-full lg:mt-px border-2 border-gray-300 lg:border-none rounded-lg lg:rounded-none">
                            <div class="px-2 text-center h-48 flex flex-col items-center justify-center">
                                <h3 class="tracking-widest">{{__('app.premium')}}</h3>
                                <h2 class="text-5xl text-gray-900 font-medium flex items-center justify-center leading-none mb-4 mt-2">
                                    €15
                                    <span class="text-gray-600 text-base ml-1">/mois</span>
                                </h2>
                                <span class="text-sm text-gray-600">180€/an</span>
                                <span class="text-sm text-gray-600">*Obligation d'inscription pour 3 mois minimum</span>
                            </div>
                            <p class="bg-gray-100 text-gray-600 h-12 text-center px-2 flex items-center -mt-px justify-center border-t border-gray-300"></p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.city_bike')}}</span>
                            </p>
                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.mountain_bike')}}</span>
                            </p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.foldable_bike')}}</span>
                            </p>
                            <p class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                          <span
                              class="w-5 h-5 inline-flex items-center justify-center bg-gray-500 text-white rounded-full flex-shrink-0">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="3" class="w-3 h-3" viewBox="0 0 24 24">
                              <path d="M20 6L9 17l-5-5"></path>
                            </svg>
                          </span><span class="lg:hidden pl-2">{{__('app.electric_bike')}}</span>
                            </p>
                            <p class="text-gray-600 text-center h-12 flex items-center justify-center">1 an</p>
                            <div class="bg-gray-100 text-gray-600 text-center h-12 flex items-center justify-center">
                                Caution
                                + Prix en fonction du vélo choisi x le nombre de jour de location
                            </div>
                            <div class="p-6 text-center border-t border-gray-300">
                                @if(auth()->check())
                                    <a href="{{'/plans/premium'}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        Choisir
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{route('customer.register')}}"
                                       class="flex items-center mt-auto text-white bg-indigo-500 opacity-75 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">
                                        S'inscrire
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endsection
</x-guest-layout>
