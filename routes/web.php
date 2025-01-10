<?php

use App\Http\Controllers\TacheController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

Route::get('/', function () {
    return view('base');
});
Route::get('/register', function () {
    return view('auth.register');
})->name('app.registerForm');
Route::get('/login', function () {
    return view('auth.login');
})->name('app.loginForm');

Route::post('/register', [UserController::class, 'register'])->name('app.register');
Route::post('/login', [UserController::class, 'login'])->name('app.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboardPage'])->name('app.dashboard');
    Route::get('/users', [UserController::class, 'userPage'])->name('app.users');
    Route::get('/taches', [TacheController::class, 'mesTaches'])->name('taches.index');
    Route::get('/taches/all', [TacheController::class, 'allTaches'])->name('taches.all');
    Route::get('/taches/create', [TacheController::class, 'create'])->name('taches.create');
    Route::post('/taches', [TacheController::class, 'store'])->name('taches.store');
    Route::get('/taches/{tache}', [TacheController::class, 'show'])->name('taches.show');
    Route::get('/taches/{id}/edit', [TacheController::class, 'edit'])->name('taches.edit');
    Route::put('/taches/{id}', [TacheController::class, 'update'])->name('taches.update');
    Route::delete('/taches/{id}', [TacheController::class, 'delete'])->name('taches.delete');

    Route::get('/taches/{tache}/share', [TacheController::class, 'showShareForm'])->name('taches.share.form');
    Route::post('/taches/{tache}/share', [TacheController::class, 'share'])->name('taches.share');
});
