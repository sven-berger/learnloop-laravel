<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center bg-red-600 text-white rounded-2xl px-6 py-4 text-center hover:bg-red-700 transition w-full sm:w-auto']) }}>
    {{ $slot }}
</button>