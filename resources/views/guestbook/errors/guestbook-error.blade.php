@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-4 relative mb-4 rounded-2xl" role="alert">
        <strong class="font-bold">Fehler!</strong>
        <span class="block sm:inline">Es gab Fehler bei der Eingabe. Bitte überprüfe deine Angaben.</span>
        <ul class="mt-2 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li class="py-2"> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif