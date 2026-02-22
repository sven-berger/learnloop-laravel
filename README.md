<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Daily Workflow

1. Aenderungen vornehmen
2. `git status`
3. `git add <files>`
4. `git commit -m "Nachricht"`
5. `git push origin main` (triggert Webhook-Deploy)
6. Ergebnis pruefen: `https://laravel.riftcore.de/`
7. Optional: Deploy-Log ansehen: `ssh sven@116.202.66.41 'tail -n 50 /var/www/laravel.riftcore.de/storage/logs/deploy.log'`

## Mini-Tutorial: Dummy-Seite mit eigener DB-Tabelle

Ziel: Eine einfache Seite unter `/dummy-page`, auf der du Text in ein Textarea eingibst, in der Datenbank speicherst und wieder ausgibst.

Ohne Rollen/Rechte, nur das Grundprinzip:

- Migration
- Model
- Controller
- View
- Route

## 1) Model + Migration anlegen

Im Projekt ausführen:

```bash
php artisan make:model DummyPageEntry -m
```

Dann die neue Migration in `database/migrations/...create_dummy_page_entries_table.php` anpassen:

```php
public function up(): void
{
    Schema::create('dummy_page_entries', function (Blueprint $table) {
        $table->id();
        $table->text('content');
        $table->timestamps();
    });
}
```

Migration ausführen:

```bash
php artisan migrate
```

## 2) Controller anlegen

```bash
php artisan make:controller DummyPageController
```

In `app/Http/Controllers/DummyPageController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\Models\DummyPageEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DummyPageController extends Controller
{
    public function index(): View
    {
        $entries = DummyPageEntry::query()
            ->latest()
            ->get();

        return view('dummy-page.index', [
            'entries' => $entries,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        DummyPageEntry::create($validated);

        return redirect()
            ->route('dummy-page.index')
            ->with('status', 'Eintrag gespeichert.');
    }
}
```

## 3) Model ausfüllbar machen

In `app/Models/DummyPageEntry.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DummyPageEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];
}
```

## 4) Routes eintragen

In `routes/web.php`:

```php
use App\Http\Controllers\DummyPageController;

Route::get('/dummy-page', [DummyPageController::class, 'index'])
    ->name('dummy-page.index');

Route::post('/dummy-page', [DummyPageController::class, 'store'])
    ->name('dummy-page.store');
```

## 5) View erstellen

Datei anlegen: `resources/views/dummy-page/index.blade.php`

```blade
<x-public-layout>
    <x-layout.content>
        <h1 class="text-xl font-semibold text-gray-900">Dummy-Page</h1>

        @if (session('status'))
            <p class="mt-3 text-sm text-green-700">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('dummy-page.store') }}" class="mt-4 grid gap-3">
            @csrf

            <div>
                <x-forms.input-label for="content" value="Inhalt" />
                <textarea
                    id="content"
                    name="content"
                    rows="5"
                    class="bg-white w-full min-w-0 p-4 border border-gray-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400"
                    required>{{ old('content') }}</textarea>
                <x-forms.input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <x-buttons.primary-button type="submit">Speichern</x-buttons.primary-button>
        </form>
    </x-layout.content>

    <x-layout.content>
        <h2 class="text-lg font-semibold text-gray-900">Gespeicherte Einträge</h2>

        <div class="mt-4 space-y-3">
            @forelse ($entries as $entry)
                <div class="border rounded-lg p-4 text-sm text-gray-700">
                    {{ $entry->content }}
                </div>
            @empty
                <p class="text-gray-500">Noch keine Einträge vorhanden.</p>
            @endforelse
        </div>
    </x-layout.content>
</x-public-layout>
```

## 6) Testen

```bash
php artisan serve
```

Dann aufrufen:

- `http://127.0.0.1:8000/dummy-page`

---

## Ergebnis

Damit hast du die komplette Basis, um Inhalte über die Datenbank zu pflegen:

- Eingabe im Formular
- Speicherung in eigener Tabelle
- Ausgabe aus der Datenbank

Später kannst du darauf aufbauen (Bearbeiten/Löschen, Rechte, Pagination, Rich-Text, etc.).
