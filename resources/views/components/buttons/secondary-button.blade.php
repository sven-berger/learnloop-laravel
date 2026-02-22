<button {{ $attributes->merge(['type' => 'button', 'class' => 'buttonSecondary bg-yellow-500 inline-flex items-center text-white justify-center border border-gray-200 rounded-2xl px-6 py-4 text-center hover:bg-yellow-600 transition w-full sm:w-auto disabled:opacity-50']) }}>
    {{ $slot }}
</button>