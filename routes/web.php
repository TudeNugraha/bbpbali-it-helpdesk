<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/antrean', [TicketController::class, 'antrean']);
Route::get('/track/{ticketNumber}', [TicketController::class, 'track']);

Route::middleware('auth')->group(function () {

    Route::get('/admin/tickets', [TicketController::class, 'index']);

    Route::get('/admin/tickets/create', [TicketController::class, 'create']);

    Route::post('/admin/tickets', [TicketController::class, 'store']);

    Route::get('/admin/tickets/{ticket}/edit', [TicketController::class, 'edit']);

    Route::put('/admin/tickets/{ticket}', [TicketController::class, 'update']);

    Route::patch('/admin/tickets/{ticket}/complete', [TicketController::class, 'complete']);

    Route::delete('/admin/tickets/{ticket}', [TicketController::class, 'destroy']);
});