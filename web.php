<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ----------------------
// Auth Routes (User)
// ----------------------
Auth::routes();

// ----------------------
// Landing Page (Halaman utama, bukan dashboard admin)
// ----------------------

Route::get('/', [HomeController::class, 'index'])->name('home');

// ----------------------
// Ticket Pages (User)
// ----------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/tiket', [TicketController::class, 'userTickets'])->name('tickets.user');
    Route::get('/tickets/bukti/{id}', [TicketController::class, 'bukti'])->name('tickets.bukti');
});

// ----------------------
// Guest Ticket Submission (Tanpa login bisa pesan)
// ----------------------
Route::post('/submit', [TicketController::class, 'store'])->name('tickets.store');

// ----------------------
// Admin Auth Routes
// ----------------------
Route::get('/admin-login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ----------------------
// Admin Dashboard (tanpa proteksi middleware dulu)
// ----------------------
Route::get('/admin-dashboard', [TicketController::class, 'dashboard'])->name('tickets.dashboard');
Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/ticket/{id}/update', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
Route::post('/tickets/bulk-action', [TicketController::class, 'bulkAction'])->name('tickets.bulkAction');
Route::get('/ticket/{id}/approve', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
Route::get('/admin/tickets/{id}/bukti', [TicketController::class, 'bukti'])->name('tickets.bukti.admin');

// ----------------------
// Profil (opsional - setelah login user)
// ----------------------
Route::get('/profile/edit', function () {
    return view('profile.edit'); // Pastikan file ini ada di resources/views/profile/edit.blade.php
})->middleware('auth')->name('profile.edit');
