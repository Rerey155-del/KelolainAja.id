<?php

use App\Models\Package;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\ContentController;

// Route untuk homepage
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


// Route untuk form upload video
Route::get('/upload', function () {
    return view('upload');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/contentPillar', [ContentController::class, 'index'])->name('user.contentPillar');
    Route::get('/contentCalendar', [ContentController::class, 'calendar'])->name('user.contentCalendar');
});

Route::get('/admin/contentUsers', function () {
    return view('/admin/contentPillar');
});

Route::get('/admin/contentCalendar', function () {
    return view('/admin/contentCalendar');
});

Route::get('/dashboard', function () {
    return view('dashboardUser');
})->middleware('auth');


// Route untuk register (pastikan nama file view benar)
Route::get('/register', function () {
    return view('auth.registration');
})->name('register');



// Route untuk login User
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Halaman login admin
Route::get('/login/admin', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Middleware untuk halaman admin dengan guard 'admin'
Route::middleware(['auth:admin'])->group(function () {


    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/tables', function () {
        return view('admin.pemesanan');
    })->name('admin.pemesanan');

    Route::get('/admin/users', [UserController::class, 'user'])->name('admin.pengguna');
    Route::get('/admin/videos', [VideoController::class, 'index'])->name('admin.videos');
    // Tetap untuk menyimpan video via POST
    Route::post('/upload', [VideoController::class, 'store'])->name('video.upload');

    Route::post('/logout/admin', [LoginAdminController::class, 'logout'])->name('admin.logout');
});


// Route untuk register
Route::post('/register', [RegistController::class, 'register'])->name('register.post');

Route::get('/upload', function () {
    return view('upload');
});

// rute untuk menampilkan deskripsi isi data
Route::get('/package/{id}', function ($id) {
    $paket = Package::findOrFail($id);
    return view('layout.packageDescription', compact('paket'));
})->name('deskripsiPaket');


// pembayaran
Route::get('/payment', [PaymentController::class, 'create'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');


Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');
Route::get('/payment/success/{orderId}', [PaymentController::class, 'success'])
    ->name('payment.success');


Route::post('/payment/ajax-callback', [PaymentController::class, 'callback'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]) // atau exclude CSRF di VerifyCsrfToken
    ->name('payment.ajax-callback');


Route::get('/payments/history', [PaymentController::class, 'history'])
    ->name('payment.history');


Route::get('/payments/{orderId}', [PaymentController::class, 'detail'])
    ->name('payment.detail');
