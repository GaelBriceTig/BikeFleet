<td class="edit__td" colspan="7">
    <form action="" wire:submit.prevent='save'>
        <div class="field">
            <div class="control">
                <label for="customer.name">{{ __('firstname') }}</label>
                <input id="customer.name" type="text" wire:model="customer.firstname" class="input">
            </div>
            @error("firstname")
            <span class="text-red-300">{{$message}}</span>
            @enderror
        </div>
        <div class="field">
            <div class="control">
                <label for="customer.lastname">{{ __('lastname') }}</label>
                <input id="customer.lastname" type="text" wire:model="customer.lastname" class="input">
            </div>
            @error("lastname")
            <span class="text-red-300">{{$message}}</span>
            @enderror
        </div>
        <div class="field">
            <div class="control">
                <label for="customer.email">{{ __('email') }}</label>
                <input id="customer.email" type="text" wire:model="customer.email" class="input">
            </div>
            @error("email")
            <span class="text-red-300">{{$message}}</span>
            @enderror
        </div>
        <div class="field">
            @if($creating)
                <div class="control">
                    <label for="customer.password_new">{{ __('password_new') }}</label>
                    <input id="customer.password_new" type="password" wire:model="password_new" class="input"
                           placeholder="Password">
                </div>
                @error("password_new")
                <span class="text-red-300">{{$message}}</span>
                @enderror
            @endif
        </div>
        <div class="field">
            @if($creating)
                <div class="control">
                    <label for="customer.password_new_confirmation">{{ __('confirm_password') }}</label>
                    <input id="customer.password_new_confirmation" type="password"
                           wire:model="password_new_confirmation" class="input"
                           placeholder="{{ __('confirm_password') }}">
                </div>
                @error("password_new_confirmation")
                <span class="text-red-300">{{$message}}</span>
                @enderror
            @endif
        </div>
        <div class="field">
            <button class="button" type="submit" wire:loading.attr="disabled">
                {{ __('save') }}
            </button>
        </div>
    </form>
    {{--    <div wire:loading>--}}
    {{--        <i class="fa-solid fa-person-biking fa-beat-fade"></i>--}}
    {{--    </div>--}}
</td>
