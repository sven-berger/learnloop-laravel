<x-app-layout>
    <x-layout.content>
        <p class="text-gray-700">{{ __('Du bist eingeloggt!') }}</p>

        <div class="mt-6 space-y-2">
            @can('moderate comments')
                <a href="{{ route('moderation.index') }}" class="block text-blue-600 hover:underline">Moderationsbereich</a>
            @endcan

            @can('create content')
                <a href="{{ route('admin.content.create') }}" class="block text-blue-600 hover:underline">Inhalte erstellen</a>
            @endcan

            @role('admin')
                <a href="{{ route('admin.index') }}" class="block text-blue-600 hover:underline">Adminbereich</a>
            @endrole
        </div>
    </x-layout.content>
</x-app-layout>