<?php

use App\Http\Controllers\AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Authenticate;
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
Route::get('/', function () {return view('landing.index');})->name('home');


//Admin Routes Frontend
Route::get('/admin/login', function () {return view('admin.login');})->name('loginAdmin');
Route::get('/admin/dashboard', [Authenticate::class, 'Dashboard'])->name('adminDashboard');
Route::get('/admin/terminal', [Authenticate::class, 'Terminal'])->name('adminTerminal');
Route::get('/admin/buslist', [Authenticate::class, 'Bus'])->name('adminBus');
Route::get('/admin/routes', [Authenticate::class, 'Route'])->name('adminRoute');


//Admin Routes Backend
Route::post('/admin/login/authenticate', [Login::class, 'AdminLogin'])->name('adminLogin');
Route::post('/admin/login/logout', [Login::class, 'AdminLogout'])->name('adminLogout');
Route::post('/admin/terminal/add', [AdminDashboard::class, 'AddTerminal'])->name('addTerminal');
Route::post('/admin/terminal/update', [AdminDashboard::class, 'UpdateTerminal'])->name('updateTerminal');
Route::get('/admin/terminal/load', [AdminDashboard::class, 'LoadTerminal'])->name('loadTerminal');
Route::post('/admin/routes/add', [AdminDashboard::class, 'AddRoute'])->name('addRoute');
Route::post('/admin/routes/edit', [AdminDashboard::class, 'EditRoute'])->name('editRoute');
Route::get('/admin/routes/load', [AdminDashboard::class, 'LoadRoute'])->name('loadRoute');
Route::post('/admin/buslist/add', [AdminDashboard::class, 'AddBus'])->name('addBus');
Route::post('/admin/buslist/edit', [AdminDashboard::class, 'EditBus'])->name('editBus');
Route::get('/admin/buslist/load', [AdminDashboard::class, 'LoadBus'])->name('loadBus');

//Fallback Route
Route::fallback(function () {
    return view('404');
});