<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('landing.')->group(function () {
    Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'home'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'role:admin', 'ban'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    // Route::get('/dashboard', function () {
    //     // dd(auth()->user()->assignRole('super'));
    //     dd(auth()->user()->getRoleNames());
    // })->name('dashboard');

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('update');
        Route::put('/change-password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('change-password');
    });


    Route::group(['as' => 'users.', 'prefix' => 'users'], function () {

        Route::group(['middleware' => ['role:super'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\AdminController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\DoctorController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\DoctorController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\DoctorController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'patient.', 'prefix' => 'patient'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\PatientController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\PatientController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\PatientController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\PatientController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'destroy'])->name('delete');
        });
    });
});
