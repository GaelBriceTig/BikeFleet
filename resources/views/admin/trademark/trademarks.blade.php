<x-admin-layout>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/datatables.min.css"/>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.trademarks') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 p-5">
        <div class="flex flex-start my-4">
            <a href="{{route('admin.trademark.add')}}"
               class="button">
                {{ __('app.add_trademark') }}
            </a>
            <div class=" mx-4">
                <label for="">
                    <input type="checkbox" class="filter-show-disabled">
                    {{ __('app.show_disabled') }}
                </label>
            </div>
        </div>

        <table class="cell-border w-full datatable-list" id="trademarks">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wide text-left">Nom</th>
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
                let $datatable = $('#trademarks');

                let columns = [
                    {data: 'name'}
                ];

                let route = '{{route('api.trademarks',false)}}';

                window.drawDataTable($datatable, route, columns);

                window.registerEditButton($datatable, '/admin/edit-trademark');

                window.registerDisableButton($datatable, '/admin/disable-trademark');

                window.registerEnableButton($datatable, '/admin/enable-trademark');

                window.registerShowDisabledChanged($datatable, '{{route('api.trademarks')}}', '{{route('api.trademarks.show-disabled')}}');
            });
        </script>
    @endsection
</x-admin-layout>
