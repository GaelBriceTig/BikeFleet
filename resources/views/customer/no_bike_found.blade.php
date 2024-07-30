<x-app-layout>
    <div class="flex flex-row justify-center py-8">
        <div class="rounded bg-white p-4 w-1/3">
            <p class="text-orange-800 bg-orange-200 font-semibold rounded p-2 text-center">
                {{ __('app.no_bike_found') }}
            </p>
            <div class="flex flex-row justify-between mt-4">
                <a class="button" href="{{route('customer.dashboard')}}">
                    {{ __('app.back_to_dashboard') }}
                </a>
                <a class="button" href="{{route('customer.bikeModels')}}">
                    {{ __('app.start_rental') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>>
