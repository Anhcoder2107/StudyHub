<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// courses
Route::apiResource('courses', 'App\Http\Controllers\CourseController');
// category-courses
Route::get('/category-courses/all', 'App\Http\Controllers\CategoryCourseController@getAllCategories');
Route::apiResource('category-courses', 'App\Http\Controllers\CategoryCourseController');

// blogs
Route::apiResource('blogs', 'App\Http\Controllers\BlogController');


// roles
Route::get('/roles/all', 'App\Http\Controllers\RoleController@getAllRoles');
Route::get('/roles/{role}/permissions', 'App\Http\Controllers\RoleController@getPermissions');

//permissions
Route::apiResource('roles', 'App\Http\Controllers\RoleController');
Route::get('/permissions/all', 'App\Http\Controllers\PermissionController@getAllPermissions');
Route::apiResource('permissions', 'App\Http\Controllers\PermissionController');

// users
Route::apiResource('users', 'App\Http\Controllers\UserController')
    ->only(['index', 'show', 'store', 'update', 'destroy']);


require __DIR__.'/auth.php';
