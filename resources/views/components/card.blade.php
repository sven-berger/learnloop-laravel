@props(['image' => null, 'title' => null, 'description' => null])

<article {{ $attributes->merge(['class' => 'h-full flex flex-col w-full bg-slate-200 border border-gray-300 rounded-2xl']) }}>
    <img src="{{ $image ?? '/images/placeholder-image.jpg' }}" alt="{{ $title ?? 'Platzhalter' }}"
        class="rounded-t-lg mb-4 w-full object-fill h-55" />
    <div class="pl-6 pr-6 pb-6">

        @if($title)
            <h5 class="mb-2 text-2xl text-gray-900">
                {{ $title }}
            </h5>
        @endif
        <div class="mb-3 dark:text-gray-400">
            @if(!empty($description))
                {{ $description }}
            @elseif($slot->isNotEmpty())
                {{ $slot }}
            @endif
        </div>
    </div>
</article>