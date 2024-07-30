<x-admin-layout>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/datatables.min.css"/>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des locations') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 p-5">
{{--        <div class="flex flex-start my-4">--}}
{{--            <div>--}}
{{--                <label for="">--}}
{{--                    <input type="checkbox" class="filter-show-disabled">--}}
{{--                    Show disabled--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}
        <table class="cell-border w-full datatable-list" id="subscriptions">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Commandé le</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Client</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Abonnement</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Numéro de série</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Date de début</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Date de fin</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Statut</th>
                {{--                <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>--}}
                {{--                <th></th>--}}
            </tr>
            </thead>
            {{--            <tbody>--}}
            {{--            @foreach(\App\Services\RentalService::getRentals() as $rental)--}}
            {{--                <tr>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["created_at"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["customer_name"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["subscription_name"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["serial_number"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["start_date"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        {{$rental["end_date"]}}--}}
            {{--                    </td>--}}
            {{--                    <td>--}}
            {{--                        <x-input-select :options="$statuses" id="bike_status_id" label="Statut"--}}
            {{--                                        :selected_id="$rental['bike_status_id']"/>--}}
            {{--                    </td>--}}
            {{--                </tr>--}}
            {{--            @endforeach--}}
            {{--            </tbody>--}}
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
        <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.13.1/dataRender/datetime.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                let $dataTable = $('#subscriptions');
                let columns = [
                    //{data: 'id'},
                    {data: 'created_at'},
                    {data: 'customer_name'},
                    {data: 'subscription_name'},
                    {data: 'serial_number'},
                    {data: 'start_date'},
                    {data: 'end_date'},
                    {data: 'bike_status_name'}
                ];
                let route = '{{route('api.rentals',false)}}';
                window.drawDataTable($dataTable, route, columns, true, true);
                // window.registerEditButton($dataTable, '/admin/edit-rental');
                // window.registerDisableButton($dataTable, '/admin/disable-rental');
                // window.registerEnableButton($dataTable, '/admin/enable-rental');
                window.registerShowDisabledChanged($dataTable, '{{route('api.rentals')}}', '{{route('api.rentals.show-disabled')}}');
            });
        </script>
    @endsection
</x-admin-layout>
