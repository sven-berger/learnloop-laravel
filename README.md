<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p><br><br><br>

## Mini-Tutorial: Dummy-Seite mit eigener DB-Tabelle

Ziel: Eine einfache Seite unter `/dummy-page`, auf der du Text in ein Textarea eingibst, in der Datenbank speicherst, ausgibst, bearbeitest und loeschst.

Ohne Rollen/Rechte, nur das Grundprinzip:

- Migration
- Model
- Controller
- View
- Route

### 1) Model + Migration anlegen

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

### 2) Controller anlegen

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
    public function index(Request $request): View
    {
        $entries = DummyPageEntry::query()
            ->latest()
            ->get();

        $editEntry = null;
        $editId = (int) $request->query('edit', 0);
        if ($editId > 0) {
            $editEntry = DummyPageEntry::query()->find($editId);
        }

        return view('dummy-page', [
            'entries' => $entries,
            'editEntry' => $editEntry,
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

    public function update(Request $request, DummyPageEntry $entry): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        $entry->update($validated);

        return redirect()
            ->route('dummy-page.index')
            ->with('status', 'Eintrag aktualisiert.');
    }

    public function destroy(DummyPageEntry $entry): RedirectResponse
    {
        $entry->delete();

        return redirect()
            ->route('dummy-page.index')
            ->with('status', 'Eintrag geloescht.');
    }
}
```

### 3) Model ausfüllbar machen

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

### 4) Routes eintragen

In `routes/web.php`:

```php
use App\Http\Controllers\DummyPageController;

Route::get('/dummy-page', [DummyPageController::class, 'index'])
    ->name('dummy-page.index');

Route::post('/dummy-page', [DummyPageController::class, 'store'])
    ->name('dummy-page.store');

Route::patch('/dummy-page/{entry}', [DummyPageController::class, 'update'])
    ->name('dummy-page.update');

Route::delete('/dummy-page/{entry}', [DummyPageController::class, 'destroy'])
    ->name('dummy-page.destroy');
```

### 5) View erstellen

Datei anlegen: `resources/views/dummy-page.blade.php`

```blade
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dummy-Page</title>
</head>
<body>
    <h1>Dummy-Page</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('dummy-page.store') }}">
        @csrf

        <label for="content">Inhalt</label><br>
        <textarea id="content" name="content" rows="6" required>{{ old('content') }}</textarea><br><br>

        @if ($errors->has('content'))
            <p>{{ $errors->first('content') }}</p>
        @endif

        <button type="submit">Speichern</button>
    </form>

    <hr>

    <h2>Gespeicherte Einträge</h2>
    @if ($entries->isEmpty())
        <p>Noch keine Einträge vorhanden.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Inhalt</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->id }}</td>
                        <td>{{ $entry->content }}</td>
                        <td>
                            <a href="{{ route('dummy-page.index', ['edit' => $entry->id]) }}">Bearbeiten</a>

                            <form method="POST" action="{{ route('dummy-page.destroy', $entry) }}" style="display:inline; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Loeschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if ($editEntry)
        <h2>Eintrag bearbeiten</h2>
        <form method="POST" action="{{ route('dummy-page.update', $editEntry) }}">
            @csrf
            @method('PATCH')

            <label for="edit_content">Inhalt</label><br>
            <textarea id="edit_content" name="content" rows="6" required>{{ old('content', $editEntry->content) }}</textarea><br><br>

            <button type="submit">Aenderung speichern</button>
            <a href="{{ route('dummy-page.index') }}">Abbrechen</a>
        </form>
    @endif
</body>
</html>
```

Hinweis: Du brauchst dafuer keine extra Seite wie `dummy-page-edit`.

### 6) Testen

```bash
php artisan serve
```

Dann aufrufen:

- `http://127.0.0.1:8000/dummy-page`

---

### Ergebnis

Damit hast du die komplette Basis, um Inhalte über die Datenbank zu pflegen:

- Eingabe im Formular
- Speicherung in eigener Tabelle
- Ausgabe aus der Datenbank

Später kannst du darauf aufbauen (Benutzerrechte, Pagination, Rich-Text, etc.).

## Cache / Optimierung: Wann was ausführen?

- Nach Änderungen in `routes/web.php` oder `routes/*.php`:
  - `php artisan route:clear`
  - optional danach: `php artisan route:cache` (vor allem für Produktion)

- Nach Änderungen in `config/*.php` oder `.env`:
  - `php artisan config:clear`
  - optional danach: `php artisan config:cache`

- Nach Änderungen an Blade-Dateien in `resources/views`:
  - `php artisan view:clear`

- Wenn "komische" Altstände auftreten (lokal):
  - `php artisan optimize:clear`
  - Das leert gesammelt Route-, Config-, View- und weitere Caches.

- Für Performance in Produktion (nach erfolgreichem Deploy):
  - `php artisan optimize`
  - Erst nutzen, wenn alles stabil läuft.

## Safe-Reihenfolge (kurz)

- Lokal nach größeren Änderungen:
  - `php artisan optimize:clear`
  - `php artisan migrate`
  - `php artisan route:list`

- Produktion nach erfolgreichem Deploy:
  - `php artisan migrate --force`
  - `php artisan optimize`

## Sonst noch sinnvoll im Daily Workflow

- Nach Frontend-Änderungen (`resources/js`, `resources/css`):
  - lokal: `npm run dev`
  - Build/Deploy: `npm run build`

- Nach neuen Migrationen im Team:
  - `php artisan migrate`
  - optional Rollback-Test lokal: `php artisan migrate:rollback`

- Schneller Smoke-Check nach Deploy:
  - Startseite, Login, Admin-Seite, Formular-POST einmal manuell klicken
  - Log bei Fehlern: `tail -n 100 storage/logs/laravel.log`
