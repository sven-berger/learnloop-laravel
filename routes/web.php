<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImprintController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsOfUseController;
use App\Http\Controllers\Admin\UserManagementController;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;


Route::get('/', [IndexController::class, 'indexAction'])->name('index');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/guestbook', [GuestbookController::class, 'guestbookAction'])->name('guestbook');
Route::post('/guestbook/save', [GuestbookController::class, 'saveAction'])
    ->middleware(['auth', 'permission:comment'])
    ->name('guestbook.save');

Route::get('/hello', [HelloController::class, 'hello'])->name('hello');
Route::match(['get', 'post'], '/test', [TestController::class, 'testAction'])->name('test');

// Route zu Datenschtutz, Nutzungsbedingungen und Impressum-Seiten
Route::get('/imprint', [ImprintController::class, 'imprint'])->name('imprint');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-of-use', [TermsOfUseController::class, 'termsOfUse'])->name('termsOfUse');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/moderation', fn() => view('access.moderation'))
        ->middleware('permission:moderate comments')
        ->name('moderation.index');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', fn(): View => view('access.admin'))->name('index');

        Route::get('/content-page', fn(): View => view('content-page.admin'))->name('contentPage.index');
        Route::get('/content/create', fn(): View => view('access.create-content'))
            ->middleware('permission:create content')
            ->name('content.create');

        Route::get('/users/management', [UserManagementController::class, 'index'])
            ->name('users.management.index');

        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
            ->name('users.edit');

        Route::patch('/users/{user}', [UserManagementController::class, 'update'])
            ->name('users.update');

        Route::get('/users/roles', [UserRoleController::class, 'index'])
            ->name('users.roles.index');

        Route::patch('/users/{user}/role', [UserRoleController::class, 'update'])
            ->name('users.roles.update');
    });
});

require __DIR__ . '/auth.php';
