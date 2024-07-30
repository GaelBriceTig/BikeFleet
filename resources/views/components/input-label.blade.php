@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-xl text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
