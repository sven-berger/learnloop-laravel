@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-gray-800 my-3']) }}>
    {{ $value ?? $slot }}
</label>