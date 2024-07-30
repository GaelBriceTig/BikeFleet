<x-guest-layout>
    @section('content')
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('app.you_need_auth') }}
            </div>

            <form method="POST" action="{{ route('customer.password.confirm') }}" class="pr-8">
                @csrf

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('app.password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <div class="flex justify-end mt-4">
                    <x-primary-button>
                        {{ __('app.confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </x-auth-card>
    @endsection
</x-guest-layout>