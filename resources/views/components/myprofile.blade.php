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
        <dl class="grid grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Name:</dt>
            <dd class="font-medium text-gray-500">{{ $name }}</dd>

            <dt class="text-gray-500">Alter:</dt>
            <dd class="font-medium text-gray-500">{{ $age }}</dd>

            <dt class="text-gray-500">Wohnort:</dt>
            <dd class="font-medium text-gray-500">{{ $location }}</dd>

            <dt class="text-gray-500">E-Mail:</dt>
            <dd class="font-medium text-gray-500">
                <span class="text-sm">
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </span>
            </dd>
    <dt class="text-gray-500">Handynummer:</dt>
            <dd class="font-medium text-gray-500">{{ $phone }}</dd>
        </dl>

<hr class="border-slate-400 my-5" />

        <dl class="grid grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Betrieb:</dt>
            <dd class="font-medium text-gray-500">{{ $company }}</dd>
            
            <dt class="text-gray-500">Status:</dt>
            <dd class="font-medium text-gray-500">{{ $status }}</dd>
        </dl>
        
        <hr class="border-slate-400 my-5" />

        <dl class="block grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <!-- <dt class="text-gray-500 mb-5">Über mich:</dt> -->
            <dd class="font-medium text-gray-500">{!! $about !!}</dd>
        </dl>
    </div>

</div>