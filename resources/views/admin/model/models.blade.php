<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des modèles encodés ') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-5 p-5">
        <div class="flex flex-start my-4">
            <a href="{{route('admin.model.add')}}"
               class="button">
                {{ __('app.add_model') }}
            </a>
            <div class=" mx-4">
                <label for="">
                    <input type="checkbox" class="filter-show-disabled">
                    {{ __('app.show_disabled') }}
                </label>
            </div>
        </div>

        <table id="bike-models" class="cell-border w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                {{--                <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>--}}
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Nom</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Marque</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Catégorie</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Matériel</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Coût supplémentaire à la location</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                <th></th>
            </tr>
            <tbody>
            </tbody>
            </thead>
        </table>
    </div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
                crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/datatables.min.css"/>

        <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/datatables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                let $bikeModelsDataTable = $('#bike-models');

                let columns = [
                    // {data: 'id'},
                    {data: 'name'},
                    {data: 'trademark_name'},
                    {data: 'category_name'},
                    {data: 'material_name'},
                    {data: 'extra_price'}
                ];

                let route = '{{route('api.models',false)}}';

                window.drawDataTable($bikeModelsDataTable, route, columns);

                window.registerEditButton($bikeModelsDataTable, '/admin/edit-model');

                window.registerDisableButton($bikeModelsDataTable, '/admin/disable-model');

                window.registerEnableButton($bikeModelsDataTable, '/admin/enable-model');

                window.registerShowDisabledChanged($bikeModelsDataTable, '{{route('api.models')}}', '{{route('api.models.show-disabled')}}');
            });
        </script>
        {{--        --}}
    @endsection
</x-admin-layout>
