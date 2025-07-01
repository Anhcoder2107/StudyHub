<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('courses', 'App\Http\Controllers\Backend\CourseController');
});

Route::get('/admin/login', function () {
    return Inertia::render('Auth/admin/auth/Login');
})->name('landing');

Route::prefix('admin')->group(function () {

    // Admin routes
    Route::get('/login', function () {
        return Inertia::render('Auth/admin/auth/Login');
    })->name('admin.login');
    Route::get('/register', function () {
        return Inertia::render('Auth/admin/auth/Register');
    })->name('admin.register');


    Route::group(['middleware' => 'auth'], function () {
        // Redirect 'admin/' to 'admin/dashboard'
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('admin.dashboard');

        // Users management routes
        Route::get('users', 'App\Http\Controllers\Backend\UserController@index')->name('admin.users.index');
        Route::get('users/create', 'App\Http\Controllers\Backend\UserController@create')->name('admin.users.create');
        Route::post('users', 'App\Http\Controllers\Backend\UserController@store')->name('admin.users.store');
        Route::get('users/{user}/edit', 'App\Http\Controllers\Backend\UserController@edit')->name('admin.users.edit');
        Route::put('users/{user}', 'App\Http\Controllers\Backend\UserController@update')->name('admin.users.update');
        Route::delete('users/{user}', 'App\Http\Controllers\Backend\UserController@destroy')->name('admin.users.destroy');
        Route::get('users/roles/{user}', 'App\Http\Controllers\Backend\UserController@roles')->name('admin.users.roles');

        //roles
        Route::resource('roles', 'App\Http\Controllers\Backend\RoleController');

        // permissions
        Route::resource('permissions', 'App\Http\Controllers\Backend\PermissionController');

        // courses
        Route::resource('courses', 'App\Http\Controllers\Backend\CourseController');

        // category-courses
        Route::resource('category-courses', 'App\Http\Controllers\Backend\CategoryCourseController');
    });

});



require __DIR__ . '/auth.php';
