<x-admin-layout>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/datatables.min.css"/>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.bikes') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-5 p-5">
        <div class="flex flex-start my-4">
            <a href="{{route('admin.bike.add')}}"
               class="button">
                {{ __('app.add_bike') }}
            </a>
            <div class=" mx-4">
                <label for="">
                    <input type="checkbox" class="filter-show-disabled">
                    Montrer les inactifs
                </label>
            </div>
        </div>

        <table class="cell-border w-full datatable-list" id="bikes">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">{{ __('app.serial_number') }}</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">{{ __('app.manufacture_date') }}</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">{{ __('app.model') }}</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">{{ __('app.status') }}</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                <th></th>
            </tr>
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
                let $datatable = $('#bikes');

                let columns = [
                    {data: 'serial_number'},
                    {data: 'manufacture_date'},
                    {data: 'bike_model_name'},
                    {data: 'status_name'}
                ];

                let route = '{{route('api.bikes',false)}}';

                window.drawDataTable($datatable, route, columns);

                window.registerEditButton($datatable, '/admin/edit-bike');

                window.registerDisableButton($datatable, '/admin/disable-bike');

                window.registerEnableButton($datatable, '/admin/enable-bike');

                window.registerShowDisabledChanged($datatable, '{{route('api.bikes')}}', '{{route('api.bikes.show-disabled')}}');
            });
        </script>
    @endsection
</x-admin-layout>
