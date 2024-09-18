<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/roles', function () {
    $data = \Spatie\Permission\Models\Role::all();
    return response()->json($data);
});
