<x-admin-layout>
    <x-layout.content>
        <h1 class="text-xl font-semibold text-gray-900">Benutzerrollen verwalten</h1>

        @if (session('status'))
            <p class="mt-3 text-sm text-green-700">{{ session('status') }}</p>
        @endif

        <div class="mt-6 space-y-4">
            @foreach ($users as $user)
                <form method="POST" action="{{ route('admin.users.roles.update', $user) }}" class="border rounded-lg p-4">
                    @csrf
                    @method('PATCH')

                    <p class="font-medium text-gray-900">#{{ $user->id }} – {{ $user->name }}</p>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>

                    <div class="mt-3 flex items-center gap-3">
                        <select name="role" class="rounded border-gray-300 text-sm" @disabled($user->id === 1)>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" @selected($user->hasRole($role))>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit"
                            class="rounded bg-blue-600 px-3 py-1.5 text-sm text-white hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed"
                            @disabled($user->id === 1)>
                            Rolle speichern
                        </button>

                        @if ($user->id === 1)
                            <span class="text-sm text-gray-600">Geschützter Haupt-Admin</span>
                        @endif
                    </div>
                </form>
            @endforeach
        </div>
    </x-layout.content>
</x-admin-layout>