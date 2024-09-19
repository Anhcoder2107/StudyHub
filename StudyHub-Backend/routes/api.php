<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CourseController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/user', function (Request $request) {
    echo "Hello, World!";
})->middleware('auth:sanctum');


Route::group([
    'prefix' => 'auth',
    'middleware' => 'api'
], function ($router) {

    Route::post('login', [LoginController::class, 'store'])->name('login');
    Route::post('register', [RegisterController::class, 'store']);


    Route::get('profile', function (Request $request) {
        return $request->user();
    });
    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('logout', [LoginController::class, 'logout']);
    
    Route::group([
        'prefix' => 'course'
    ], function ($router) { 
        Route::get('index', [CourseController::class, 'index']);
        Route::get('show/{id}', [CourseController::class, 'show']);
        
    })->middleware(EnsureTokenIsValid::class);
});


