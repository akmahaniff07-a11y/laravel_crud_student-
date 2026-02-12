<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\BukuController;



Route::get('/niff', function () {
   return'Hello World!';
});

Route:: post ('/submit',function()
{
return'Data submitted!';
}
);

Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

Route::get('/post/{id}/{slug}', function ($id, $slug) {
    return "Post $id: $slug";
});

Route::get('/about', function () {
    return 'Tentang Kami';
});

Route::get('/product/users', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/users', function () {
    return view('users.index');
});
Route::get('/users', [UserController::class, 'index']);

Route::resource('categories', App\Http\Controllers\admin\categorycontroller::class);

Route::get('/categories', [categorycontroller::class, 'index']);



Route::resource('buku', BukuController::class);

Route::get('/buku', [BukuController::class, 'index']);

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;

Route::resource('classroom', ClassroomController::class);
Route::resource('student', StudentController::class);
