@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'bg-white w-full min-w-0 p-4 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400',
]) }}>