<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <form method="post" action="{{route('admin.material.save')}}" enctype="multipart/form-data" id="material__form">
        @csrf
        @if(isset($material))
            <input type="hidden" id="id" name="id" value="{{$material->id}}">
        @endif
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('app.material') }}</label>
            <div class="col-sm-10">
                <input class="mr-4" type="text" name="name" id="name" value="{{isset($material) ? $material->name : null}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('admin.materials')}}"
               class="px-4 bg-transparent p-3 rounded-lg text-[rgb(146,146,146)]/60 hover:bg-gray-100 hover:text-[rgb(146,146,146)]/800 mr-2">
                {{ __('app.back') }}
            </a>
            <button type="submit"
                    class="modal-close px-4 bg-[rgb(4,193,121)]/60 p-3 rounded-lg text-white hover:bg-[rgb(4,193,121)]/70">
                {{ __('app.save') }}
            </button>
        </div>
    </form>
    @section('scripts')
        <script>
            $(function () {
                $("#material__form").validate({
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
