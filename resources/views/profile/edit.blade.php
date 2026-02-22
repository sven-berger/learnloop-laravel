<x-app-layout>
    <x-layout.content>
        <div class="w-full max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </x-layout.content>

    <x-layout.content>
        <div class="w-full max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </x-layout.content>

    <x-layout.content>
        <div class="w-full max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-layout.content>
</x-app-layout>