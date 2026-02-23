@props([
    'name' => "null",
    'age' => "null",
    'location' => "null",
    'email' => "null",
    'phone' => "null",
    'about' => "null",
    'company' => "null",
    'status' => "null",
])


<div {{ $attributes }}>
    <div class="block mb-10">
        <dl class="grid grid-cols-1 sm:grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Name:</dt>
            <dd class="font-medium text-gray-500 wrap-break-word">{{ $name }}</dd>

            <dt class="text-gray-500">Alter:</dt>
            <dd class="font-medium text-gray-500">{{ $age }}</dd>

            <dt class="text-gray-500">Wohnort:</dt>
            <dd class="font-medium text-gray-500 wrap-break-word">{{ $location }}</dd>

            <dt class="text-gray-500">E-Mail:</dt>
            <dd class="font-medium text-gray-500 break-all">
                <span class="text-sm">
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </span>
            </dd>
            <dt class="text-gray-500">Handynummer:</dt>
            <dd class="font-medium text-gray-500 wrap-break-word">{{ $phone }}</dd>
        </dl>

        <hr class="border-slate-400 my-5" />

        <dl class="grid grid-cols-1 sm:grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Betrieb:</dt>
            <dd class="font-medium text-gray-500 wrap-break-word">{{ $company }}</dd>
            
            <dt class="text-gray-500">Status:</dt>
            <dd class="font-medium text-gray-500 wrap-break-word">{{ $status }}</dd>
        </dl>
        
        <hr class="border-slate-400 my-5" />

        <dl class="block gap-y-2 mb-3">
            <dd class="font-medium text-gray-500 wrap-break-word">{!! $about !!}</dd>
        </dl>
    </div>

</div>
