<x-admin-layout>
    <x-layout.content>
        <h1 class="text-xl font-semibold text-gray-900">Adminbereich</h1>
        <p class="mt-2 text-gray-700">Hier hast du volle Administrationsrechte.</p>

        <div class="mt-6 space-y-2">
            <a href="{{ route('admin.users.management.index') }}" class="block text-blue-600 hover:underline">Benutzer
                verwalten</a>
            <a href="{{ route('admin.content.create') }}" class="block text-blue-600 hover:underline">Inhalte
                erstellen</a>
            <a href="{{ route('admin.users.roles.index') }}" class="block text-blue-600 hover:underline">Benutzerrollen
                verwalten</a>
        </div>
    </x-layout.content>
</x-admin-layout>