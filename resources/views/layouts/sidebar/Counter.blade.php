<x-box data-controller="sidebar-counter">
    <x-h2 title="Counter"></x-h2>

    <div class="text-xl font-bold text-gray-800 bg-white rounded-2xl border p-4 border-gray-200 text-center mb-6"
        data-sidebar-counter-target="output">0</div>

    <div class="flex flex-col gap-3">
        <button type="button" class="bg-green-600 text-white rounded-2xl p-4 hover:bg-green-700 transition"
            data-action="click->sidebar-counter#increaseCount">
            Erhöhen
        </button>
        <button type="button" class="bg-yellow-400 text-white rounded-2xl p-4 hover:bg-yellow-500 transition"
            data-action="click->sidebar-counter#decreaseCount">
            Verringern
        </button>
        <button type="button" class="bg-red-500 text-white rounded-2xl p-4 hover:bg-red-600 transition"
            data-action="click->sidebar-counter#resetCount">
            Zurücksetzen
        </button>
    </div>
</x-box>