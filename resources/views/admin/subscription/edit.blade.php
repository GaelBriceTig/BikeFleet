<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <form method="post" action="{{route('admin.subscription.save')}}" enctype="multipart/form-data">
        @csrf
        @if(isset($subscription))
            <input type="hidden" id="id" name="id" value="{{$subscription->id}}">
        @endif
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom de l'abonnement</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" value="{{isset($subscription) ? $subscription->name : null}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="customer_id" class="col-sm-2 col-form-label">Client</label>
            <div class="col-sm-10">
                <x-input-select id="customer_id" label="Sélectionner un client"
                                :options="$customers" :selected_id="isset($subscription) ? $subscription->customer_id : null"/>
                @error('customer_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('admin.subscriptions')}}"
               class="px-4 bg-transparent p-3 rounded-lg text-[rgb(146,146,146)]/60 hover:bg-gray-100 hover:text-[rgb(146,146,146)]/800 mr-2">
                Retour
            </a>
            <button type="submit"
                    class="modal-close px-4 bg-[rgb(4,193,121)]/60 p-3 rounded-lg text-white hover:bg-[rgb(4,193,121)]/70">
                Enregistrer
            </button>
        </div>
    </form>
</x-admin-layout>
