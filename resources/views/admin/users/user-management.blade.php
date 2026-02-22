<x-admin-layout>
    <x-layout.content>
        <h1 class="text-xl font-semibold text-gray-900">Benutzerverwaltung</h1>

        @if (session('status'))
            <p class="mt-3 text-sm text-green-700">{{ session('status') }}</p>
        @endif

        <p class="mt-2 text-gray-700">Hier kannst du alle Benutzer verwalten.</p>

        <table class="grid w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        E-Mail
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Rolle
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aktionen
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->roles->pluck('name')->join(', ') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">
                                Bearbeiten
                            </a>
                            <span class="mx-2 text-gray-300">|</span>
                            <a href="{{ route('admin.users.roles.index') }}" class="text-blue-600 hover:text-blue-900">
                                Rollen
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-layout.content>
</x-admin-layout>