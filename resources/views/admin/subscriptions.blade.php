<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des abonements encodés ') }}
        </h2>
</x-slot>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
@csrf
    <div class="container mx-auto mt-5 p-5">
        <button type="button" name="create_record" id="create_record" class="btn btn-success"><i class="bi bi-plus-squarre"></i> Add </button>
        <table id="subscriptions-table" class="cell-border w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nom</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Client</th>
                    {{-- <th width="180px">Action</th>
                    <th width="50px"><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs">Delete </button></th> --}}
                </tr>
                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-3" type="checkbox" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                    <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="p-3 text-sm text-gray-700">{{$subscription->name}}</td>
                            <td class="p-3 text-sm text-gray-700">{{Customer::getCustomer($subscription->customer_id)->lastname}}</td>
                            </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
        <div >
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/sl-1.5.0/datatables.min.js"></script>
    <script>
        $('#subscriptions-table').DataTable();
    </script>
</x-admin-layout>