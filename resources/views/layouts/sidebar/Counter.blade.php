<x-layout.box data-controller="sidebar-counter">
    <x-layout.h2 title="Counter"></x-layout.h2>

    <div class="text-xl font-bold text-gray-800 bg-white rounded-2xl border p-4 border-gray-200 text-center mb-6"
        data-sidebar-counter-target="output">0</div>

    <div class="flex flex-col gap-3">
        <x-buttons.primary-button data-action="click->sidebar-counter#increaseCount">
            Erhöhen
        </x-buttons.primary-button>

        <x-buttons.secondary-button data-action="click->sidebar-counter#decreaseCount">
            Verringern
        </x-buttons.secondary-button>

        <x-buttons.danger-button data-action="click->sidebar-counter#resetCount">
            Zurücksetzen
        </x-buttons.danger-button>
    </div>
</x-layout.box>