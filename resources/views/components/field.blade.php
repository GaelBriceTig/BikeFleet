@props([
    'label',
    'model',
])
<div class="field">
    <label for="firstname" class="label">
        {{ $label }}
    </label>
    <div class="control">
        <input type="text" wire:model="{{$model}}" class="input">
    </div>
    @error("{{$model}}")
    <span class="text-red-300">
                {{$message}}
    </span>
    @enderror
</div>
