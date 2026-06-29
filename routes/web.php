<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\TicketController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Activities\ActivityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ── Public Routes ─────────────────────────────────────────────────────────────
Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/about',     [PageController::class, 'about'])->name('about');
Route::get('/services',  [PageController::class, 'services'])->name('services');
Route::get('/features',  [PageController::class, 'features'])->name('features');
Route::get('/contact',   [PageController::class, 'contact'])->name('contact');

Auth::routes();

// ── Profile (any authenticated user) ─────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile',  [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile',  [ProfileController::class, 'update'])->name('profile.update');
});

// ── Tasks (personal productivity — any authenticated user) ───────────────────
Route::middleware('auth')->prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/',             [TaskController::class, 'index'])->name('index');
    Route::post('/',            [TaskController::class, 'store'])->name('store');
    Route::get('/{task}/edit',  [TaskController::class, 'edit'])->name('edit');
    Route::put('/{task}',       [TaskController::class, 'update'])->name('update');
    Route::patch('/{task}/toggle', [TaskController::class, 'toggle'])->name('toggle');
    Route::delete('/{task}',    [TaskController::class, 'destroy'])->name('destroy');
});

// ── Activities (daily work tracking — any authenticated user) ────────────────
Route::middleware('auth')->prefix('activities')->name('activities.')->group(function () {
    Route::get('/',                [ActivityController::class, 'index'])->name('index');
    Route::get('/create',          [ActivityController::class, 'create'])->name('create');
    Route::post('/',               [ActivityController::class, 'store'])->name('store');
    Route::get('/{activity}',      [ActivityController::class, 'show'])->name('show');
    Route::get('/{activity}/edit', [ActivityController::class, 'edit'])->name('edit');
    Route::put('/{activity}',      [ActivityController::class, 'update'])->name('update');
    Route::delete('/{activity}',   [ActivityController::class, 'destroy'])->name('destroy');
});

// ── Admin Routes ──────────────────────────────────────────────────────────────
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Shared logout
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    // Customer management
    Route::get('/customers',             [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/{user}',      [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{user}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{user}',      [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{user}',   [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Support tickets
    Route::get('/tickets',           [AdminTicketController::class, 'index'])->name('tickets');
    Route::get('/tickets/{ticket}',  [AdminTicketController::class, 'show'])->name('tickets.show');
    Route::put('/tickets/{ticket}',  [AdminTicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{ticket}', [AdminTicketController::class, 'destroy'])->name('tickets.destroy');

    // Reports & Analytics (NEW)
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
});

// ── Customer Routes ───────────────────────────────────────────────────────────
Route::prefix('customer')->middleware('customer')->name('customer.')->group(function () {

    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    // Tickets — explicit ordering: /create before /{ticket}
    Route::get('/tickets',              [TicketController::class, 'index'])->name('tickets');
    Route::get('/tickets/create',       [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets',             [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}',     [TicketController::class, 'show'])->name('tickets.show');
});
