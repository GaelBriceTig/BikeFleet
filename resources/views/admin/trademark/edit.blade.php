<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <form method="post" action="{{route('admin.trademark.save')}}" enctype="multipart/form-data" id="trademark__from">
        @csrf
        @if(isset($trademark))
            <input type="hidden" id="id" name="id" value="{{$trademark->id}}">
        @endif
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom de la marque</label>
            <div class="col-sm-10">
                <input class="mr-4" type="text" name="name" id="name"
                       value="{{isset($trademark) ? $trademark->name : null}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('admin.trademarks')}}"
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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
                integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_fr.min.js"
                integrity="sha512-J09lQZepqsxLm1HOKW1ljCSU9Ua87itcnjqRTlKIheEWbGlMO90QQK0Mj/eshCqdoUsADzNisjqr1X8D3hN1cw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(function () {
                $("#trademark__from").validate({
                    rules: {
                        name: {
                            required: true,
                            maxlength: 50
                        }
                    },
                    messages: {},
                });
            });
        </script>
    @endsection
</x-admin-layout>
