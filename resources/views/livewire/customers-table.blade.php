<div>
    <div class="field">
        <input type="text" class="input" wire:model.debouce.200ms="search">
    </div>
    <table class="table w-full">
        <thead>
        <tr>
            <td colspan="5">
                <div class="flex justify-start">
{{--                    <div>--}}
{{--                        <label class="mr-4" for="showDisabled">--}}
{{--                            <input name="showDisabled" type="checkbox" wire:model='showDisabled'>--}}
{{--                            show disabled--}}
{{--                        </label>--}}
{{--                    </div>--}}
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
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Abonement</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            @if($editId == $customer->id)
                <tr class="row-edit">
                    <livewire:customer-form :customer="$customer" :key="$customer->id" :isInserting="false"/>
                </tr>
            @else
                <tr class="{{ $customer->disabled ? "disabled" : ""  }}">
                    <td>
                        <input type="checkbox" name="" id="" wire:model="selection" value={{$customer->id}}>
                    </td>
                    <td>
                        {{$customer->firstname}}
                    </td>
                    <td>
                        {{$customer->lastname}}
                    </td>
                    <td>
                        {{$customer->email}}
                    </td>
                    <td>
                        @foreach($customer->subscriptionNames() as $subscriptionName)
                            <ul>
                                <li>{{$subscriptionName->name}}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        <button class="button" wire:click="startEdit({{$customer->id}})">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                </tr>
            @endif
        @endforeach
        @if(!$isCreating)
            <tr class="row-create">
                <td colspan="6">
                    <button class="button" wire:click="startCreate">
                        <i class="fa-solid fa-square-plus"></i>
                    </button>
                </td>
            </tr>
        @else
            <tr class="row-create">
                <livewire:customer-form :customer="$newCustomer" :key="$newCustomer->id" :creating="$isCreating"/>
            </tr>
        @endif
        </tbody>
    </table>
    {{$customers->links()}}
</div>
