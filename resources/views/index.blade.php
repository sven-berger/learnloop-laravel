@extends('layouts.base')
@section('title', 'Startseite (Laravel + Tailwind + Stimulus)')
@section('content')

  <x-grid-layout cols="4">
    <div class="h-full">
      <x-card title="Warum Laravel?" image="/images/cardImage-1.jpg">
        <p>
          Nachdem ich mich intensiv mit React und moderner Frontend-Architektur beschäftigt habe, wollte ich bewusst
          wieder
          tiefer ins Backend eintauchen – dorthin, wo für mich die eigentliche Softwareentwicklung beginnt.
        </p>
        <p>
          Mit Laravel hat sich schnell etwas sehr Vertrautes angefühlt.
        </p>
        <p>
          Schon mein erstes kleines Projekt – ein klassisches Gästebuch – hat mir gezeigt, warum.<br>
          Der Ablauf war logisch. Klar strukturiert. Verständlich.
        </p>
        <ul>
          <li>
            Ich habe einen Controller angelegt, sauber getrennt in Zuständigkeiten.
          </li>
          <li>
            Eine Route für GET, eine Route für POST.
          </li>
          <li>
            Eine View für das Formular.
          </li>
          <li>
            Im Controller die Daten entgegengenommen – im Grunde genau so, wie man es aus „Vanilla PHP“ kennt, nur
            strukturierter, eleganter und konsistenter.
          </li>
        </ul>
        <p>
          Die Datenbankanbindung?<br>
          <strong>Erstaunlich einfach</strong> -&gt; Migration erstellen, Model definieren, speichern –
          <strong>fertig</strong>.<br>
          Und was mich besonders begeistert hat: Die Daten lassen sich direkt wieder an die View übergeben und mit einer
          einfachen <kbd>foreach</kbd>-Schleife sauber ausgeben. Kein unnötiger Umweg, keine überkomplizierte Struktur –
          einfach logisch.
        </p>
        <p>
          Alles hatte seinen Platz.<br>
          Controller, Routes, Views, Models.<br>
          Keine Vermischung. Keine Unsicherheit.
        </p>
        <p>
          Es hat sich nicht nach „Workaround“ angefühlt, sondern nach Architektur.
        </p>
      </x-card>
    </div>

    <div class="h-full">
      <x-card title="Blade Komponenten" image="/images/cardImage-2.jpg">
        <p>
          Ich mochte an React immer die Idee wiederverwendbarer Komponenten mit Props.<br>
          Das war einer der Hauptgründe, warum ich React so spannend fand.
        </p>
        <p>
          Und dann stellte ich fest: Mit Blade ist das genauso möglich – nur serverseitig.
        </p>
        <ul>
          <li>
            Wiederverwendbare Komponenten.
          </li>
          <li>
            Props übergeben.
          </li>
          <li>
            Saubere Struktur.
          </li>
          <li>
            Klare Trennung.
          </li>
        </ul>
        <p>
          Einfach. Verständlich. Wartbar.
        </p>
        <h3>
          Frontend bleibt – aber sinnvoll integriert
        </h3>
        <p>
          Parallel dazu habe ich meine Kenntnisse in Stimulus wieder aufgefrischt und konnte problemlos kleine interaktive
          Elemente wie einen Counter umsetzen. Genau so, wie ich es mag: gezielt, kontrolliert, ergänzend.
        </p>
        <ol>
          <li>
            JavaScript ist für mich ein Werkzeug – kein Selbstzweck.
          </li>
          <li>
            Laravel gibt mir das Backend-Fundament.
          </li>
          <li>
            Blade gibt mir Struktur im Frontend.
          </li>
          <li>
            Stimulus ergänzt dort, wo Interaktivität sinnvoll ist.
          </li>
        </ol>
      </x-card>
    </div>

    <div class="h-full">
      <x-card title="Mein aktueller Stand" image="/images/cardImage-3.jpg">
        <p>
          Ich habe:
        </p>
        <ul>
          <li>
            Migrationen erstellt
          </li>
          <li>
            Datenbanken strukturiert
          </li>
          <li>
            Controller logisch aufgebaut
          </li>
          <li>
            GET- und POST-Routen sauber definiert
          </li>
          <li>
            Formulare verarbeitet
          </li>
          <li>
            Validierung umgesetzt
          </li>
          <li>
            Daten persistiert
          </li>
          <li>
            Inhalte mit <kbd>foreach</kbd> sauber dargestellt
          </li>
          <li>
            Blade-Komponenten mit Props verwendet
          </li>
          <li>
            Kleine interaktive Features mit Stimulus ergänzt
          </li>
        </ul>
        <p>
          Und vor allem: Ich habe verstanden, warum es so funktioniert.<br>
          Das ist für mich der entscheidende Punkt.
        </p>
        <p>
          React bleibt Teil meines Werkzeugkastens.<br>
          Aber <strong>Laravel</strong> fühlt sich aktuell nach <strong>Zuhause</strong> an.
        </p>
        <p>
          Hier entwickle ich weiter.<br>
          Hier vertiefe ich Architektur.<br>
          Hier baue ich meine Backend-Kompetenz aus.
        </p>
        <p>
          Und genau das ist der Weg, den ich bewusst gewählt habe.
        </p>
      </x-card>
    </div>

    <div class="h-full">
      <x-card title="Meine Zukunft mit React" image="/images/placeholder-image.jpg">

      </x-card>
    </div>
  </x-grid-layout>


  <x-content>
    <x-h2 title="Hallo Stimulus!"></x-h2>
    <div data-controller="hello">
      <input data-hello-target="name" data-action="input->hello#sync" type="text"
        class="bg-white w-full p-4 border border-gray-200 rounded-2xl mt-3" placeholder="Gib deinen Namen ein" />

      <button data-action="click->hello#greet" class="bg-blue-500 text-white rounded-full p-4 mt-5">
        Begrüßung!
      </button>

      <div data-hello-target="output"></div>
    </div>
  </x-content>


@endsection