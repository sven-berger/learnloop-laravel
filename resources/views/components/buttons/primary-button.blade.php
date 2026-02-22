<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center bg-blue-500 text-white rounded-2xl px-6 py-4 text-center hover:bg-blue-600 transition w-full sm:w-auto']) }}>
    {{ $slot }}
</button>