<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Default route to display the welcome view
Route::get('/', function () {
    return view('welcome');
});

// Laravel authentication routes
Auth::routes();

// Routes inside the 'auth' middleware group require authentication
Route::group(['middleware' => 'auth'], function () {

    // Dashboard route accessible after authentication
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Home route, accessible after authentication
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Routes for managing services
    Route::group(['prefix' => 'service'], function () {

        // Routes accessible only to users with 'service.write' permission
        Route::group(['middleware' => 'permission:service.write'], function () {
            Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('', [ServiceController::class, 'store'])->name('service.store');
            Route::put('/{service}', [ServiceController::class, 'update'])->name('service.update');
            Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');
            Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
        });

        // Routes accessible to users with 'service.read' or 'service.write' permission
        Route::group(['middleware' => 'permission:service.read|service.write'], function () {
            Route::get('', [ServiceController::class, 'index'])->name('service.index');
            Route::get('/{service}', [ServiceController::class, 'show'])->name('service.show');
        });
    });

    // Routes for managing users
    Route::group(['prefix' => 'user'], function () {

        // Routes accessible only to users with 'users.write' permission
        Route::group(['middleware' => 'permission:users.write'], function () {
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::post('', [UserController::class, 'store'])->name('user.store');
            Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        // Routes accessible to users with 'users.read' or 'users.write' permission
        Route::group(['middleware' => 'permission:users.read|users.write'], function () {
            Route::get('', [UserController::class, 'index'])->name('user.index');
            Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        });
    });
});
