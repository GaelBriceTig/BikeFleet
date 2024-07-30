<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>
    <form method="post" action="{{route('admin.model.save')}}" id="model__form" enctype="multipart/form-data">
        @csrf
        @if(isset($model))
            <input type="hidden" id="id" name="id" value="{{$model->id}}">
        @endif
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom du modèle</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" value="{{isset($model) ? $model->name : null}}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="trademark_id" class="col-sm-2 col-form-label">Marque</label>
            <div class="col-sm-10">
                <x-input-select id="trademark_id" label="Sélectionner une marque"
                                :options="$trademarks" :selected_id="isset($model) ? $model->trademark_id : null"/>
                @error('trademark_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label">Catégorie</label>
            <div class="col-sm-10">
                <x-input-select id="category_id" label="Sélectionner une catégorie"
                                :options="$categories" :selected_id="isset($model) ? $model->category_id : null"/>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="material_id" class="col-sm-2 col-form-label">
                {{ __('app.materials') }}
            </label>
            <div class="col-sm-10">
                <x-input-select id="material_id" label="Sélectionner un matériau"
                                :options="$materials" :selected_id="isset($model) ? $model->material_id : null"/>
                @error('material_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description"
                   class="col-sm-2 col-form-label">Description:</label>
            <textarea id="description" name="description"
                      placeholder="description du vélo" rows="4"
                      class="disabled:bg-gray-100 w-full flex-1 placeholder:text-slate-400 appearance-none border border-black-300 py-2 px-2 bg-white text-black-700 placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-600">{{isset($model) ? $model->description : null}}</textarea>
        </div>
        <div class="form-group row">
            <label for="extra_price" class="col-sm-2 col-form-label">Coût supplémentaire à la location (par
                mois)</label>
            <div class="col-sm-10">
                <input type="text" name="extra_price" id="extra_price"
                       value="{{isset($model) ? $model->extra_price : null}}">
                @error('extra_price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Photo du modèle:</label>

            @if(isset($model->image))
                <img src="{{asset('storage/'. $model->image)}}" alt="{{$model->name}}" class="w-80">
            @endif

            <input type="file" id="image" name="image"
                   class="block text-sm text-gray-400 file:mr-2 file:py-2 file:px-2 file:rounded-md file:border-solid file:border file:border-black-200 file:text-sm file:bg-white file:text-black-500 hover:file:bg-gray-100">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
            <a href="{{route('admin.models')}}"
               class="px-4 bg-transparent p-3 rounded-lg text-[rgb(146,146,146)]/60 hover:bg-gray-100 hover:text-[rgb(146,146,146)]/800 mr-2">
                Retour
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
                $("#model__form").validate({
                    rules: {
                        name: {
                            required: true,
                            maxlength: 50
                        },
                        trademark_id: {
                            required: true,
                        },
                        category_id: {
                            required: true,
                        },
                        material_id: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        extra_price: {
                            required: true,
                        },
                    },
                    messages: {},
                });
            });
        </script>
    @endsection
</x-admin-layout>
