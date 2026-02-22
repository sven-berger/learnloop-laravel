@if ($maxPages > 1)
    <div class="flex justify-start mb-8 gap-2">
        @for ($i = 1; $i <= $maxPages; $i++)
            <a href="{{ route('guestbook', ['page' => $i], false) }}" @class([
                'px-4 py-2 rounded-2xl border',
                'bg-blue-500 text-white border-blue-500' => $currentPage === $i,
                'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' => $currentPage !== $i,
            ])>
                {{ $i }}
            </a>
        @endfor
    </div>
@endif