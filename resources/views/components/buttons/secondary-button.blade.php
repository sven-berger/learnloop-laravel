@props([
    'type' => 'button',
    'variant' => 'yellow',
])



@php
    $baseClasses = 'buttonSecondary inline-flex items-center justify-center border rounded-2xl px-6 py-4 text-center transition w-full sm:w-auto disabled:opacity-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300';

    $variantClasses = match ($variant) {
        'white' => 'bg-white text-gray-900 border-gray-300 hover:bg-gray-100',
        'black' => 'bg-black text-white border-black hover:bg-gray-900',
        default => 'bg-yellow-500 text-white border-gray-200 hover:bg-yellow-600',
    };

    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
    {{ $slot }}
</button>