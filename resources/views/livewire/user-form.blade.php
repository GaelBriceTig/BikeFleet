<td colspan="5">
    <form action="" wire:submit.prevent='save'>
        <div class="field">
            <label for="name" class="label">Nom</label>
            <div class="control">
                <input type="text" wire:model="user.name" class="input">
            </div>
            @error("user.name")
            <span class="text-red-300">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control">
                <input type="email" wire:model="user.email" class="input">
            </div>
            @error("user.email")
            <span class="text-red-300">
                {{$message}}
            </span>
            @enderror
        </div>
        @if ($creating)
            <div class="field">
                <label for="password_new" class="label">Mot de passe</label>
                <div class="control">
                    <input type="password" wire:model="password_new" class="input">
                </div>
                @error("password_new")
                <span class="text-red-300">
                {{$message}}
            </span>
                @enderror
            </div>
            <div class="field">
                <label for="password_new_confirmation" class="label">Confirmation du mot de passe</label>
                <div class="control">
                    <input type="password" wire:model="password_new_confirmation" class="input">
                </div>
                @error("password_new_confirmation")
                <span class="text-red-300">
                {{$message}}
            </span>
                @enderror
            </div>
        @endif

        <div class="field">
            <label for="role" class="label">Role</label>
            <div class="control">
                <select name="roleId" id="" wire:model="roleId" class="input">
                    <option value="-1">Sélectionnez un role</option>
                    @foreach ($roles as $role)
                        @if($user->role_id == $role->id)
                            <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                        @else
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error("roleId")
            <span class="text-red-300">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="buttons">
            <button class="button" type="submit" wire:loading.attr="disabled">
                Sauvegarder
            </button>
        </div>
    </form>
    <div wire:loading>
        <i class="fa-solid fa-person-biking fa-beat-fade"></i>
    </div>
</td>
