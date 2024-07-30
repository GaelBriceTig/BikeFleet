<x-app-layout>
    <h1 class="uppercase pb-4 text-orange-600 text-xl">
        Notre catalogue de vélos
    </h1>
    <section class="grid grid-cols-3 gap-4">
        @foreach($models as $model)
            <div class="col-span-3 lg:col-span-1">
                <div class="rounded bg-white p-4 h-full">
                    <h3 class="text-orange-900 font-semibold">{{$model->name}}</h3>
                    <div>
                        @if(!empty($model->image))
                            <img src="{{asset('storage/'. $model->image)}}" alt="{{$model->name}}" class="w-80 mx-auto">
                        @endif
                    </div>
                    <p>
                        {{$model->description}}
                    </p>
                    <div class="field text-green-500">
                        + {{$model->extra_price}} € / mois
                    </div>
                    <p class="pt-4 text-right">
                        <a href="{{route('customer.rental', $model->id)}}" class="button">
                            Réserver
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </section>
</x-app-layout>
