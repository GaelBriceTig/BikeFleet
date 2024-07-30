<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="p-4 border-b-2 border-purple-800 text-purple-800 uppercase">{{ __('app.company') }}</h2>

                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-4 gap-12">
                        <a class="col-span-1 h-full flex flex-col justify-center" href="{{route('admin.users')}}">
                            <div class="text-center uppercase p-4 bg-gray-200 rounded hover:opacity-80">
                                {{ __('app.users') }}
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="p-4 border-b-2 border-purple-800 text-purple-800 uppercase">{{ __('app.customers_and_rentals') }}</h2>


                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="grid grid-cols-4 gap-12">

                        <a class="col-span-1 h-full flex flex-col justify-center" href="{{route('admin.customers')}}">
                            <div class="text-center uppercase p-4 bg-gray-200 rounded hover:opacity-80">
                                {{ __('app.customers') }}
                            </div>
                        </a>

                        <a class="col-span-1 h-full flex flex-col justify-center" href="{{route('admin.rentals')}}">
                            <div class="text-center uppercase p-4 bg-gray-200 rounded hover:opacity-80">
                                {{ __('app.rentals') }}
                            </div>
                        </a>

                        <a class="col-span-1 h-full flex flex-col justify-center"
                           href="{{route('admin.subscriptions')}}">
                            <div class="text-center uppercase p-4 bg-gray-200 rounded hover:opacity-80">
                                {{ __('app.subscriptions') }}
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

</x-admin-layout>
