<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $avatar = App\Models\User::find(1)->avatar;
    return view('avatar', compact('avatar'));
});
