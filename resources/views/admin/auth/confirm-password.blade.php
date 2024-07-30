<x-guest-layout>
    @section('content')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('app.you_need_auth') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.confirm') }}" class="pr-8">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('app.password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('app.confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
        @endsection
</x-guest-layout>
