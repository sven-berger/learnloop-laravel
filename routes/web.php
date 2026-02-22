<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImprintController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsOfUseController;


use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'indexAction'])->name('index');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/guestbook', [GuestbookController::class, 'guestbookAction'])->name('guestbook');
Route::post('/guestbook/save', [GuestbookController::class, 'saveAction'])->name('guestbook.save');

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
});

require __DIR__ . '/auth.php';
