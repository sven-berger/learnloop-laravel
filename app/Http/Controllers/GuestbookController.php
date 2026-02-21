<?php
namespace App\Http\Controllers;

use App\Http\Requests\GuestBookEntryRequest;
use App\Models\GuestBookEntry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GuestbookController
{
    public function guestbookAction(Request $request): View|RedirectResponse
    {
        $limit = env("GUESTBOOK_ENTRIES_LIMIT", 5);
        $maxEntries = GuestBookEntry::count();
        $maxPages = (int) ceil($maxEntries / $limit);
        $page = (int) $request->get('page', 1);
        $page = max(1, min($page, $maxPages));
        $offset = ($page - 1) * $limit;

        $entries = GuestBookEntry::orderBy('created_at', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return view('guestbook', ['entries' => $entries, 'maxPages' => $maxPages, 'currentPage' => $page]);
    }

    public function saveAction(GuestBookEntryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        GuestBookEntry::create($validated);
        return redirect()->route('guestbook')->with('success', 'Eintrag erfolgreich hinzugefügt.');
    }
}
