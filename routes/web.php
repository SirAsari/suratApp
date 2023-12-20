<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterTypesController;
use App\Http\Controllers\LettersController;
use App\Http\Middleware\IsGuest;
use App\Http\Middleware\IsLogin;
use App\Http\Middleware\IsGuru;
use App\Http\Middleware\IsStaff;

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
Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/auth', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware(['IsLogin'])->group(function () {
    Route::post('/login', [UserController::class, 'loginAuth'])->name('Auth');
    Route::get('/', function () { return view('user.dashboard'); })->name('dashboard');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('userDelete');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['IsLogin', 'IsGuru'])->group(function () {
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::prefix('/guru')->name('guru.')->group(function () {
            Route::get('/', [UserController::class, 'guruIndex'])->name('index');
            Route::get('/create', [UserController::class, 'guruCreate'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'guruEdit'])->name('edit');
            Route::patch('/edit/{id}', [UserController::class, 'guruUpdate'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });
});

Route::middleware(['IsLogin', 'IsStaff'])->group(function () {
    Route::prefix('/user')->name('user.')->group(function () {
        Route::prefix('/tataUsaha')->name('tataUsaha.')->group(function () {
            Route::get('/', [UserController::class, 'tataUsahaIndex'])->name('index');
            Route::get('/create', [UserController::class, 'tataUsahaCreate'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'tataUsahaEdit'])->name('edit');
            Route::patch('/edit/{id}', [UserController::class, 'tataUsahaUpdate'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::prefix('/guru')->name('guru.')->group(function () {
            Route::get('/', [UserController::class, 'guruIndex'])->name('index');
            Route::get('/create', [UserController::class, 'guruCreate'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'guruEdit'])->name('edit');
            Route::patch('/edit/{id}', [UserController::class, 'guruUpdate'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });

});

Route::prefix('/letter')->name('letter.')->group(function () {
        Route::get('/', [lettersController::class, 'Index'])->name('index');
        Route::get('/create', [lettersController::class, 'Create'])->name('create');
        Route::post('/store', [lettersController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [lettersController::class, 'Edit'])->name('edit');
        Route::patch('/edit/{id}', [lettersController::class, 'Update'])->name('update');
        Route::delete('/delete/{id}', [lettersController::class, 'destroy'])->name('delete');
});

Route::prefix('/letterType')->name('letterType.')->group(function () {
        Route::get('/', [letterTypesController::class, 'Index'])->name('index');
        Route::get('/create', [letterTypesController::class, 'Create'])->name('create');
        Route::post('/store', [letterTypesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [letterTypesController::class, 'Edit'])->name('edit');
        Route::patch('/edit/{id}', [letterTypesController::class, 'Update'])->name('update');
        Route::delete('/delete/{id}', [letterTypesController::class, 'destroy'])->name('delete');
        Route::get('/export-excel', [letterTypesController::class, 'exportExcel'])->name('export-excel');
});