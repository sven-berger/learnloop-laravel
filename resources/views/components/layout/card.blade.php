@props(['image' => null, 'title' => null, 'description' => null])

<article {{ $attributes->merge(['class' => 'h-full flex flex-col w-full bg-slate-200 border border-gray-300 rounded-2xl card']) }}>
    <img src="{{ $image ?? '/images/placeholder-image.jpg' }}" alt="{{ $title ?? 'Platzhalter' }}"
        class="rounded-t-lg mb-4 w-full object-cover h-44 sm:h-55" />
    <div class="p-4 sm:px-6 sm:pb-6">

        @if($title)
            <x-layout.h2>
                {{ $title }}
            </x-layout.h2>
        @endif
        <div class="mt-2">
            @if(!empty($description))
                {{ $description }}
            @elseif($slot->isNotEmpty())
                {{ $slot }}
            @endif
        </div>
    </div>
</article>