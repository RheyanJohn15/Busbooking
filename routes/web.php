<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Landing Routes
Route::get('/', function () {
    return view('landing.index');
});


//Admin Routes
Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::get('/admin/dashboard', function () {
    return view('admin.index');
});
