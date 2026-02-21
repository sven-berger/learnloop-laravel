@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 relative mb-4 rounded-2xl" role="alert">
        <strong class="font-bold block sm:inline">{{ session('success') }}</strong>
    </div>
@endif