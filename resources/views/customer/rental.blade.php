<x-app-layout>
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 lg:col-span-1">
            @if(!empty($model->image))
                <img src="{{asset('storage/'. $model->image)}}" alt="{{$model->name}}" class="w-max">
            @endif
        </div>
        <div class="col-span-2 lg:col-span-1 prose">
            <div class="rounded bg-white p-4">
                <h2>{{$model->name}}</h2>
                <div class="field text-green-500">
                    + {{$model->extra_price}} € / mois
                </div>
                <p>
                    {{$model->description}}
                </p>
                <div class="">
                    <form action="{{route('customer.rental.store')}}" id="customer-rental-store" method="post">
                        @csrf
                        <input type="hidden" name="bike_model_id" value="{{$model->id}}">
                        <div class="field">
                            <label for="start_datetime">Date</label>
                            <input type="text" name="start_datetime" id="start_datetime" readonly>
                        </div>
                        <div class="field">
                            <label for="duration">Durée</label>
                            <select name="duration" id="duration">
                                <option value="1">1 jour</option>
                                <option value="2">2 jours</option>
                                <option value="3">3 jours</option>
                                <option value="7">1 semaine (7 jours)</option>
                                <option value="31">1 mois (31 jours)</option>
                            </select>
                        </div>
                        <div class="field">
                            <button type="submit" class="w-full button">
                                Réserver
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"--}}
    {{--            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"--}}
    {{--            integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

    @vite(['resources/js/rental.js'])

</x-app-layout>
