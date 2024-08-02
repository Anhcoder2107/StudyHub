<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    echo "Hello, World!";
})->middleware('auth:sanctum');

// Route::group([

//     'middleware' => 'auth:api',

// ], function ($router) {

//     Route::post('login', [LoginController::class, 'store']);
//     Route::post('register', [RegisterController::class, 'store']);
//     Route::post('logout', [LoginController::class, 'logout']);
//     Route::post('refresh', [LoginController::class, 'refresh']);

// });


// Route::get('login' , [LoginController::class, 'index']);
// Route::post('login' , [LoginController::class, 'store']);
// Route::post('register' , [RegisterController::class, 'store']);


Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [LoginController::class, 'store']);
    Route::post('register', [RegisterController::class, 'store']);
    
});


Route::middleware(['api'])->group(function () {
    Route::get('profile', function (Request $request) {
        return $request->user();
    });
    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('logout', [LoginController::class, 'logout']);
});
