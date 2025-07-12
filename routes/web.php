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

Route::get('/landing', function () {
    return Inertia::render('Landing');
})->name('landing');

Route::get('/profilevue', function () {
    return Inertia::render('Profile');
})->name('profile.vue');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Courses
    Route::get('courses/detail', 'App\Http\Controllers\FrontEnd\CourseController@details')->name('courses.detail');
    Route::get('courses/search', 'App\Http\Controllers\FrontEnd\CourseController@search')->name('courses.search');
    Route::get('courses/discover', 'App\Http\Controllers\FrontEnd\CourseController@discover')->name('courses.discover');
    Route::resource('courses', 'App\Http\Controllers\FrontEnd\CourseController');
    // Route::get('courses/{course}/show', 'App\Http\Controllers\FrontEnd\CourseController@show')->name('courses.show');


    // Study Classes
    Route::get('classes/search', 'App\Http\Controllers\FrontEnd\StudyClassController@search')->name('study-classes.search');
    Route::get('classes/discover', 'App\Http\Controllers\FrontEnd\StudyClassController@discover')->name('study-classes.discover');
    Route::resource('classes', 'App\Http\Controllers\FrontEnd\StudyClassController');
    // Route::get('study-classes/{studyClass}/show', 'App\Http\Controllers\FrontEnd\StudyClassController@show')->name('study-classes.show');
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


    Route::group(['middleware' => ['auth','role:admin|teacher|student']], function () {
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
        Route::resource('roles', 'App\Http\Controllers\Backend\RoleController')->names([
            'index' => 'admin.roles.index',
            'create' => 'admin.roles.create',
            'store' => 'admin.roles.store',
            'show' => 'admin.roles.show',
            'edit' => 'admin.roles.edit',
            'update' => 'admin.roles.update',
            'destroy' => 'admin.roles.destroy',
        ]);

        // permissions
        Route::resource('permissions', 'App\Http\Controllers\Backend\PermissionController')->names([
            'index' => 'admin.permissions.index',
            'create' => 'admin.permissions.create',
            'store' => 'admin.permissions.store',
            'show' => 'admin.permissions.show',
            'edit' => 'admin.permissions.edit',
            'update' => 'admin.permissions.update',
            'destroy' => 'admin.permissions.destroy',
        ]);

        // courses
        Route::resource('courses', 'App\Http\Controllers\Backend\CourseController')->names([
            'index' => 'admin.courses.index',
            'create' => 'admin.courses.create',
            'store' => 'admin.courses.store',
            'show' => 'admin.courses.show',
            'edit' => 'admin.courses.edit',
            'update' => 'admin.courses.update',
            'destroy' => 'admin.courses.destroy',
        ]);

        // category-courses
        Route::resource('category-courses', 'App\Http\Controllers\Backend\CategoryCourseController')->names([
            'index' => 'admin.category-courses.index',
            'create' => 'admin.category-courses.create',
            'store' => 'admin.category-courses.store',
            'show' => 'admin.category-courses.show',
            'edit' => 'admin.category-courses.edit',
            'update' => 'admin.category-courses.update',
            'destroy' => 'admin.category-courses.destroy',
        ]);

        // classes
        Route::resource('classes', 'App\Http\Controllers\Backend\ClassController')->names([
            'index' => 'admin.classes.index',
            'create' => 'admin.classes.create',
            'store' => 'admin.classes.store',
            'show' => 'admin.classes.show',
            'edit' => 'admin.classes.edit',
            'update' => 'admin.classes.update',
            'destroy' => 'admin.classes.destroy',
        ]);

        // blogs
        Route::resource('blogs', 'App\Http\Controllers\Backend\BlogController')->names([
            'index' => 'admin.blogs.index',
            'create' => 'admin.blogs.create',
            'store' => 'admin.blogs.store',
            'show' => 'admin.blogs.show',
            'edit' => 'admin.blogs.edit',
            'update' => 'admin.blogs.update',
            'destroy' => 'admin.blogs.destroy',
        ]);
    });

});



require __DIR__ . '/auth.php';
