<x-guest-layout>
    @section('content')
        <div class="grid grid-cols-2 place-content-center h-full m-8 p-4 border-solid border-4">
            <div
                class="bg-[url('/resources/images/friendly.jpg')] h-5/5 bg-cover bg-no-repeat w-auto lg:w-3/3">
            </div>
            <div>
                <x-auth-card>

                    <h1 class="text-4xl font-bold dark:text-white ">Formulaire d'inscription</h1>
                    <form method="POST" action="{{ route('customer.register') }}" class=" w-full h-full">
                        @csrf
                        <!-- Firstname -->
                        <div>
                            <x-input-label for="firstname" :value="__('app.subscription_form')" />

                            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />

                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                        </div>
                        <!-- Lastname -->
                        <div>
                            <x-input-label for="lastname" :value="__('app.lastname')" />

                            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />

                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('app.email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('app.password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('app.confirm_password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('customer.login') }}">
                                {{ __('app.already_registered') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('app.register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-auth-card>
            </div>
        </div>
    @endsection('content')
</x-guest-layout>
