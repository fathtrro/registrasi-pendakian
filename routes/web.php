<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route untuk halaman dashboard
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes untuk Admin
Route::prefix('admin')->group(function () {
    // Form Login Admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

    // Proses Login Admin
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

    // Proses Logout Admin
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Routes yang dilindungi oleh middleware 'admin'
    Route::middleware(['admin'])->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Tambahkan rute admin lainnya di sini
    });
});

// Routes untuk User (disediakan oleh Breeze)
Route::middleware(['auth'])->group(function () {
    // Dashboard User
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Tambahkan rute user lainnya di sini
});

// Route Home (opsional)
Route::get('/', function () {
    return view('welcome');
});




Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Tambahkan rute admin lainnya di sini
});

Route::middleware('auth')->group(function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    // Tambahkan rute pengguna lainnya di sini
});

use App\Http\Controllers\MountainController;

Route::resource('mountains', MountainController::class);


require __DIR__.'/auth.php';
