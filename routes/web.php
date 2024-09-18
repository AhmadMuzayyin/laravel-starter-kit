<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Roles\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth.session')->group(function () {
    Route::get('/home', [App\Http\Controllers\Home\HomeController::class, 'root']);
    Route::get('{any}', [App\Http\Controllers\Home\HomeController::class, 'index'])->where('any', '^(?!roles).*$')->name('index');
    Route::controller(RolesController::class)->group(function () {
        Route::get('roles', 'index')->name('roles.index');
        Route::get('roles/create', 'create')->name('roles.create');
        Route::post('roles/store', 'store')->name('roles.store');
        Route::get('roles/{role}', 'show')->name('roles.show');
        Route::get('roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('roles/{role}', 'update')->name('roles.update');
        Route::delete('roles/{role}', 'destroy')->name('roles.destroy');
    });
    # logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

require __DIR__ . '/auth.php';
