@php
    $birthday = \Carbon\Carbon::create(1991, 1, 21);
    $age = $birthday->age;
@endphp

<x-box>
    <x-h2 title="Das bin ich" class="mb-8"></x-h2>
    <x-myprofile name="Sven Oliver Berger" age="{{ $age }}" location="Limburger Straße 30 • 65510 Idstein"
        email="bergersvenoliver@gmail.com" phone="+49 1511 9409788" about="Mein Traumberuf liegt in der Webentwicklung, PHP und
        JavaScript (HTML und CSS selbstredend)<br /><br />
    Die Kombination aus Laravel (PHP), Stimulus (JavaScript) und Tailwind CSS (CSS) ist für mich die perfekte Mischung,
    um moderne und effiziente Webanwendungen zu erstellen.<br /><br />
    Mit React(Js) habe ich ebenfalls über Monate Erfahrung gesammelt, finde es spannend, aber ich denke mir: Da geht
    noch Mehr!<br /><br />
    Ich bin begeistert von der Möglichkeit, kreative Lösungen zu entwickeln und gleichzeitig eine saubere und wartbare
    Codebasis zu pflegen." company="WolkenWerk GmbH" status="Prakikant" />
</x-box>