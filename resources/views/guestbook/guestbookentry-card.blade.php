<div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex gap-6">
        <!-- Avatar & User Info (Links) -->
        <div class="w-50 shrink-0">
            <div class="w-48 h-48 bg-linear-to-br from-blue-400 to-purple-500 rounded-xl flex mb-5 items-center justify-center text-white text-xl font-bold">
                {{ strtoupper(substr($entry->username, 0, 1)) }}
            </div>
            <div class="mt-3">
                <p class="font-semibold text-gray-900 text-sm">{{ $entry->username }}</p>
                @if ($entry->email)
                    <a href="mailto:{{ $entry->email }}" class="text-xs text-blue-500 hover:underline break-all">
                        {{ $entry->email }}
                    </a>
                @endif
            </div>
        </div>

        <!-- Content (Rechts) -->
        <div class="flex-1">
            <div class="flex justify-between items-start gap-4 mb-3">
                <h3 class="text-lg font-bold text-gray-900 flex-1">{{ $entry->title }}</h3>
                <div class="text-xs text-gray-500 text-right shrink-0">
                    {{ $entry->created_at->format('d. M Y') }}<br>
                    {{ $entry->created_at->format('H:i') }} Uhr
                </div>
            </div>
            <div class="text-gray-700 text-sm prose prose-sm max-w-none mb-3">
                {!! $entry->message !!}
            </div>
            <div class="text-xs text-gray-500 pt-3 border-t border-gray-100">
                Quelle:
                <span class="font-semibold text-gray-700">
                    @switch($entry->source)
                        @case('google')
                            🔍 Google
                        @break
                        @case('woltlab')
                            🎮 WoltLab
                        @break
                        @case('bewerbung')
                            📄 Bewerbung
                        @break
                        @default
                            {{ $entry->source }}
                    @endswitch
                </span>
            </div>
        </div>
    </div>
</div>
