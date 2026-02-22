<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->with('roles')
            ->orderBy('id')
            ->get(['id', 'name', 'email']);

        $roles = Role::query()->orderBy('name')->pluck('name');

        return view('admin.users.roles', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if ((int) $user->id === 1) {
            return back()->with('status', 'Die Rolle von Benutzer #1 ist geschützt und kann nicht geändert werden.');
        }

        $validated = $request->validate([
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);

        $user->syncRoles([$validated['role']]);

        return back()->with('status', 'Rolle für Benutzer #' . $user->id . ' wurde aktualisiert.');
    }
}
