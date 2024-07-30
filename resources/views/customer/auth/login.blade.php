<x-guest-layout>
    @section('content')
        <div class="flex justify-center items-center w-full m-10 pb-44 scroll-p-24">
            <div class="grid grid-cols-2 gap-0 place-content-center h-1/2 p-10 border-solid border-4">
                <div
                    class="bg-[url('/resources/images/register.jpeg')] h-5/5 bg-cover bg-no-repeat w-auto lg:w-3/3">
                </div>
                <div>
                    <x-auth-card>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                        <form method="POST" action="{{ route('customer.validate') }}" class="pr-8">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')"/>

                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                              :value="old('email')"
                                              required autofocus/>

                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('app.password')"/>

                                <x-text-input id="password" class="block mt-1 w-full"
                                              type="password"
                                              name="password"
                                              required autocomplete="current-password"/>

                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('app.remember_me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                   href="{{ route('customer.register') }}">
                                    {{ __('app.new_customer') }}
                                </a>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 pl-4"
                                   href="{{ route('customer.password.request') }}">
                                    {{ __('app.forgotten_password') }}
                                </a>

                                <x-primary-button class="ml-3">
                                    {{ __('app.connect') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-auth-card>
                </div>
            </div>
    @endsection
</x-guest-layout>
