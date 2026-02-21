@php
    $birthday = \Carbon\Carbon::create(1991, 1, 21);
    $age = now()->diffInYears($birthday);
@endphp

<div class="bg-gray-300 rounded-2xl pl-6 pr-6 pb-6 mt-5">
    <h2
        class="lg:text-2xl text-xl relative inline-block text-transparent bg-clip-text bg-linear-to-r from-sky-400 to-emerald-600 after:content-[''] after:absolute after:left-0 after:-bottom-1 after:w-full after:h-0.75 after:bg-linear-to-r after:from-sky-400 after:to-emerald-600 pb-2 mb-10 mt-6">
        Das bin ich
    </h2>

    <div class="block mb-10">
        <dl class="grid grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Name:</dt>
            <dd class="font-medium text-gray-500">Sven Oliver Berger</dd>

            <dt class="text-gray-500">Alter:</dt>
            <dd class="font-medium text-gray-500">{{ $age }}</dd>

            <dt class="text-gray-500">Wohnort:</dt>
            <dd class="font-medium text-gray-500">65510 • Idstein</dd>

            <dt class="text-gray-500">E-Mail:</dt>
            <dd class="font-medium text-gray-500">
                <span class="text-sm">
                    <a href="mailto:bergersvenoliver@gmail.com">bergersvenoliver@gmail.com</a>
                </span>
            </dd>
            <dt class="text-gray-500">Handynummer:</dt>
            <dd class="font-medium text-gray-500">+49 15119409788</dd>
        </dl>

        <hr class="border-slate-400 my-5" />

        <dl class="grid grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500">Betrieb:</dt>
            <dd class="font-medium text-gray-500">WolkenWerk GmbH</dd>

            <dt class="text-gray-500">Status:</dt>
            <dd class="font-medium text-gray-500">Praktikant</dd>
        </dl>

        <hr class="border-slate-400 my-5" />

        <dl class="block grid-cols-[auto_1fr] gap-x-6 gap-y-2 mb-3">
            <dt class="text-gray-500 mb-5">Über mich:</dt>
            <dd class="font-medium text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores alias mollitia nemo soluta, libero tempore veritatis numquam aliquam officiis? Doloribus.</dd>
        </dl>
    </div>

    <div class="lg:mb-5 lg:w-96 lg:h-96 md:w-48 h-48 bg-gray-100 lg:flex lg:items-center lg:justify-center rounded-xl">
        <img src="/images/sidebarImage1.jpg" alt="" class="w-full h-full object-cover object-top rounded-xl transition-transform duration-300 hover:scale-105 my-10" />
    </div>

    <div class="lg:mb-5 lg:w-96 lg:h-96 md:w-48 h-48 bg-gray-100 lg:flex lg:items-center lg:justify-center rounded-xl">
        <img src="/images/sidebarImage2.jpg" alt="" class="w-full h-full object-cover object-top rounded-xl transition-transform duration-300 hover:scale-105 my-10" />
    </div>

    <div class="lg:mb-5 lg:w-96 lg:h-96 md:w-48 h-48 bg-gray-100 lg:flex lg:items-center lg:justify-center rounded-xl">
        <img src="/images/sidebarImage3.png" alt="" class="w-full h-full object-cover object-top rounded-xl transition-transform duration-300 hover:scale-105 my-10" />
    </div>
</div>
