<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;

use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\FinanceDashboardController;
use App\Http\Controllers\SalesDashboardController;
use App\Http\Controllers\ProductionDashboardController;
use App\Http\Controllers\InventoryDashboardController;
use App\Http\Controllers\LogisticsDashboardController;

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static views (optional)
Route::view('/notifications', 'notifications')->name('notifications');
Route::view('/announcements', 'announcements')->name('announcements');

// Guest routes (unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Email verification
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Password confirmation + update
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('update-password', [PasswordController::class, 'update'])->name('password.update');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role-based dashboards
    Route::prefix('dashboards')->group(function () {
        Route::get('/owner', [OwnerDashboardController::class, 'index'])->name('dashboards.owner');
        Route::get('/manager', [ManagerDashboardController::class, 'index'])->name('dashboards.manager');
        Route::get('/finance', [FinanceDashboardController::class, 'index'])->name('dashboards.finance');
        Route::get('/sales', [SalesDashboardController::class, 'index'])->name('dashboards.sales');
        Route::get('/production', [ProductionDashboardController::class, 'index'])->name('dashboards.production');
        Route::get('/inventory', [InventoryDashboardController::class, 'index'])->name('dashboards.inventory');
        Route::get('/logistics', [LogisticsDashboardController::class, 'index'])->name('dashboards.logistics');
    });

    // Resource routes for CRUD with consistent naming
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');


     Route::prefix('crud')->group(function () {
    Route::resource('suppliers', SupplierController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    
    });
});
