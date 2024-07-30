<x-guest-layout>
    @section('content')
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('app.sub_thank_you') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('app.email_sent') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('app.resend') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('app.log_out') }}
                    </button>
                </form>
            </div>
        </x-auth-card>
    @endsection
</x-guest-layout>
