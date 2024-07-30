<div>
    <div class="field">
        <input type="text" class="input" wire:model.debouce.500ms="search">
    </div>
    <div class="field">
        <button class="button" wire:click="startCreate">
            creation
        </button>
    </div>
    {{--    @dump($selection)--}}
{{--    @dump($anyDisabled)--}}
    <table class="table w-full">
        <thead>
        <tr>
            <td colspan="5">
                <div class="flex justify-start">
                    <div>
                        <label class="mr-4" for="showDisabled">
                            Afficher les éléments désactivés
                            <input name="showDisabled" type="checkbox" wire:model='showDisabled'>
                        </label>
                    </div>
                    @if(sizeOf($selection) > 0 && $anyDisabled)
                        <button class="button mr-4" wire:click='enableSelection'>
                            actif
                        </button>
                    @elseif(sizeOf($selection) > 0 && !$anyDisabled)
                        <button class="button mr-4" wire:click='disableSelection'>
                            inactif
                        </button>
                    @endif

                </div>
            </td>
        </tr>
        </thead>
        <thead>
        <tr>
            <th></th>
            <th>nom</th>
            <th>email</th>
            <th>role</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="{{ $user->disabled ? "disabled" : ""  }}">
                <td>
                    <input type="checkbox" name="" id="" wire:model="selection" value={{$user->id}}>
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->role->name}}
                </td>
                <td>
                    <button class="button" wire:click="startEdit({{$user->id}})">Modifier</button>
                </td>
            </tr>
            @if($editId == $user->id)
                <tr class="row-edit">
                    <livewire:user-form :user="$user" :key="$user->id" :isInserting="false"/>
                </tr>
            @endif
        @endforeach
        @if($isCreating)
            <tr class="row-create">
                <livewire:user-form :user="$newUser" :key="$newUser->id" :creating="$isCreating"/>
            </tr>
        @endif
        </tbody>
    </table>
    {{$users->links()}}
</div>
