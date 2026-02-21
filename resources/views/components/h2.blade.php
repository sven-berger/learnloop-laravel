@props(['title' => null])

<h2 {{ $attributes->merge(['class' => "lg:text-2xl text-xl relative inline-block text-transparent bg-clip-text bg-linear-to-r from-sky-400 to-emerald-600 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.75 after:bg-linear-to-r after:from-sky-400 after:to-emerald-600 pb-2 mb-5"]) }}>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @elseif($title)
        {{ $title }}
    @endif
</h2>
