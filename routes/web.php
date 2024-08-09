<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $avatar = App\Models\User::find(1)->avatar;
    return view('avatar', compact('avatar'));
});

Auth::routes();

Route::get('/', [App\Http\Controllers\Home\HomeController::class, 'root']);
Route::get('{any}', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('index');
