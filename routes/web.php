<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'indexAction'])->name('index');
Route::get('/guestbook', [\App\Http\Controllers\GuestbookController::class, 'guestbookAction'])->name('guestbook');
Route::match(['get', 'post'], '/test', [\App\Http\Controllers\TestController::class, 'testAction'])->name('test');
