<x-guest-layout>
    @section('content')
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('app.ask_new_password') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('customer.password.email') }}" class="pr-8">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('app.email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('app.email_password_link') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    @endsection
</x-guest-layout>
