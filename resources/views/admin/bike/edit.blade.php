<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <form method="post" action="{{route('admin.bike.save')}}" id="bike__form">
        @csrf
        @if(isset($bike))
            <input type="hidden" id="id" name="id" value="{{$bike->id}}">
        @endif
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Numéro de série</label>
            <div class="col-sm-10">
                <input class="mr-4" type="text" name="serial_number" id="serial_number"
                       value="{{isset($bike) ? $bike->serial_number : null}}">
                @error('serial_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Date de production</label>
            <div class="col-sm-10">
                <input class="mr-4" type="text" name="manufacture_date" id="manufacture_date"
                       value="{{isset($bike) ? $bike->manufacture_date : null}}" readonly>
                @error('manufacture_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="trademark_id" class="col-sm-2 col-form-label">Modèle</label>
            <div class="col-sm-10">
                <x-input-select id="bike_model_id" label="Sélectionner un modèle"
                                :options="$models" :selected_id="isset($bike) ? $bike->bike_model_id : null"/>
                @error('bike_model_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="trademark_id" class="col-sm-2 col-form-label">Statut</label>
            <div class="col-sm-10">
                <x-input-select id="status_id" label="Sélectionner un modèle"
                                :options="$statuses" :selected_id="isset($bike) ? $bike->status_id : null"/>
                @error('status_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('admin.bikes')}}"
               class="px-4 bg-transparent p-3 rounded-lg text-[rgb(146,146,146)]/60 hover:bg-gray-100 hover:text-[rgb(146,146,146)]/800 mr-2">
                Retour
            </a>
            <button type="submit"
                    class="modal-close px-4 bg-[rgb(4,193,121)]/60 p-3 rounded-lg text-white hover:bg-[rgb(4,193,121)]/70">
                Enregistrer
            </button>
        </div>
    </form>
    @section('scripts')
        <script>
            $(function () {
                $("#bike__form").validate({
                    rules: {
                        serial_number: {
                            required: true,
                            maxlength: 50
                        },
                        bike_model_id: {
                            required: true,
                        },
                        manufacture_date: {
                            required: true,
                        },
                        status_id: {
                            required: true,
                        }
                    },
                    messages: {},
                });
            });
        </script>
    @endsection
</x-admin-layout>
