@props(['options', 'id', 'label', 'selected_id'])
<select id="{{$id}}" name="{{$id}}"
        class=" focus:outline-none focus:ring-2 focus:ring-gray-600 w-52 text-gray-700 py-2 px-3 border border-black-300 bg-white">
    <option value="" disabled selected>
        {{$label}}
    </option>
    @foreach($options as $item)
        @if(isset($selected_id) && $selected_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
        @else
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endif
    @endforeach
</select>
