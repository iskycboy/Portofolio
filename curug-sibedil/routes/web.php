<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



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

// ----------------------
// Auth Routes (User)
// ----------------------
Auth::routes();

// ----------------------
// Landing Page (Halaman utama)
// ----------------------
Route::get('/', function () {
    return response()->view('index');
})->name('home');

// ----------------------
// Ticket Pages (User - Perlu Login)
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
// Admin Authentication Routes
// ----------------------
Route::get('/admin-login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ----------------------
// Admin Dashboard & Management
// ----------------------
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [TicketController::class, 'dashboard'])->name('tickets.dashboard');
    
    // Ticket Management
    Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/ticket/{id}/update', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    
    // Bulk Actions
    //Route::post('/tickets/bulk-action', [TicketController::class, 'bulkAction'])->name('tickets.bulkAction');
    Route::post('/tickets/bulk-action', [TicketController::class, 'bulkAction'])->name('admin.tickets.bulk-action');
    
    // Approve Ticket
    Route::get('/ticket/{id}/approve', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
    
    // View Bukti dari Admin
    //Route::get('/tickets/{id}/bukti', [TicketController::class, 'bukti'])->name('tickets.bukti.admin');

    Route::get('/admin/tickets/{id}/bukti', [TicketController::class, 'bukti'])
    ->name('tickets.bukti.admin');

});

// ---------------------- //
// Akun //
// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ----------------------
// User Profile (Setelah Login)
// ----------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
});

// ----------------------
// Form Tiket
// ----------------------
Route::get('/tiket', [TicketController::class, 'userTickets'])->name('tickets.user');


// ----------------------
// Storage untuk file upload
// ----------------------
Route::get('/storage/payment_proofs/{filename}', function ($filename) {
    $path = storage_path('app/public/payment_proofs/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->name('payment.proof');

// ----------------------
// Fallback untuk 404
// ----------------------
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});