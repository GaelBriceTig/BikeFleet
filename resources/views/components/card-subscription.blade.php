@props(['name', 'description', 'to'])

<div class="p-4 bg-white rounded-lg col-span-4 lg:col-span-1">
    <div class="prose">
        <h2>
            {{$name}}
        </h2>
        <span class="text-purple-300">Actif jusqu'au {{$to}}</span>
        <p>
            {{$description}}
        </p>
    </div>
    <div class="flex flex-row justify-between">
        <form method="POST" action="{{ route('customer.subscription.destroy') }}"
              class="bg-purple-200 p-4 w-1/3 text-center flex flex-col justify-center hover:opacity-80">
            <button type="submit">
                {{ __('app.cancel_sub') }}
            </button>
            @csrf
        </form>
        <a class="bg-purple-200 p-4 w-1/3 text-center flex flex-col justify-center">
            Details
        </a>
    </div>
</div>
